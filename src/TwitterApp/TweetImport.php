<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TwitterApp;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputOption, InputInterface};
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;
use TwitterAPIExchange;

/**
 * Description of TweetCollector
 *
 * @author Hernan Andres Picatto <hpicatto@uscd.edu>
 * @author Pablo Gabriel Picatto <p.picatto@gmail.com>
 */
class TweetImport extends Command
{
    private $config = [];
    private $url = [
        'base' => 'https://api.twitter.com/1.1/search/tweets.json',
        'param' => null
    ];

    protected function configure()
    {
        $this
            ->setName('tweet-import')
            ->setDescription('Import tweets to MongoDb')
            ->addOption('dateFrom', 'f', InputOption::VALUE_REQUIRED, 'Date from YYYY-MM-DD')
            ->addOption('dateTo', 't', InputOption::VALUE_OPTIONAL, 'Date to YYYY-MM-DD')
            ->addOption('hashtag', '#', InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Hastag without hash symbol')
            ->addOption('geocode', 'g', InputOption::VALUE_OPTIONAL, 'Geocode separated by comma')
            ->addOption('max', 'm', InputOption::VALUE_OPTIONAL, 'Maximum tweets retreived')    
            ->setHelp('
                This command allows you to imports tweets to MonogoDB filtering
                them hashtag, date from and date to.
                ex:
                `tweet-import -f 08-10-2016 -t 08-21-2016 -g 37.781157,-122.398720,1mi -m 100 -# hashtag1 -# hashtag2...`
            ')
        ;
        $this->config = Yaml::parse(file_get_contents(__DIR__.'/../../app/parameters.yml'))['config'];
    }

    private function addTweeterParam($paramName, $paramValue, $propertySeparator = '=', $glue = '&')
    {
        $this->url['param'] = preg_replace('/(^|&)since_id=[^&]*/', '', $this->url['param']);
        if ($this->url['param']) {
            $this->url['param'] .= $glue; 
        }
        $this->url['param'] .= sprintf('%s%s%s', $paramName, $propertySeparator, $paramValue);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($input->getOption('hashtag') as $hastag) {
            $this->addTweeterParam('#', $hastag, '', '+OR+');
        }
        if ($geocode = $input->getOption('geocode')) {
            $this->addTweeterParam('geocode', $geocode);
        }
        if ($max = $input->getOption('max')) {
            $this->addTweeterParam('count', $max);
        } else {
            $this->addTweeterParam('count', 200);
        }
        if ($dateFrom = $input->getOption('dateFrom')) {
            $this->addTweeterParam('since', $dateFrom, ':');
        }
        if ($dateTo = $input->getOption('dateTo')) {
            $this->addTweeterParam('until', $dateTo, ':');
        }
        $this->addTweeterParam('include', 'retweets', ':');
        $this->getTweets($input, $output);
    }
    private function getTweets(InputInterface $input, OutputInterface $output) {
        $a = new \MongoClient();
        $db = $a->selectDB("twitter");
        $previousMetadata = $db->tweetMetadata->findOne();
        var_dump($previousMetadata);
//        die();

        if ($previousMetadata) {
            $this->addTweeterParam('since_id', $previousMetadata["max_id"], '=', '&');
        }

        $output->writeln(sprintf('Importing tweets from url: <info>%s?q=%s</info>', $this->url['base'], $this->url['param']));
        $twitter = new TwitterAPIExchange($this->config['twitter']);
        
        $response = json_decode($twitter
            ->setGetfield(sprintf('?q=%s', $this->url['param']))
            ->buildOauth($this->url['base'], 'GET')
            ->performRequest()
        );
//        @todo: This should create 2 entities and get always the last tweet ordered by
//        importedAt using the id to filter imported tweets.
 
        $tweets = $response->statuses;
        if ($tweets && is_array( $tweets) && count($tweets)) {
            $response->search_metadata->createdAt = new \DateTime();
            $db->tweetMetadata->insert($response->search_metadata);
            foreach ($tweets as $tweet)
            {
                $output->writeln(sprintf('Persisting tweet: <info>%s</info>', $tweet->text));
//                $tweet->tweetMetadataId = $response->search_metadata['_id'];
                $db->tweet->insert($tweet);   
            }
            $output->writeln(sprintf('Last tweet: <info>%s</info>, tweets imported per request: <info>%s</info>', $response->search_metadata->max_id_str, $response->search_metadata->count));
        } else {
            $output->writeln('<error>Tweets not found with requested filters</error>');
        }
        die();
        if ($tweets) {
            $this->getTweets($input, $output);
        }
    }
}
