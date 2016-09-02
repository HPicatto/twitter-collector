<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;

namespace Documents;

/**
 * @author Hernan Andres Picatto <hpicatto@uscd.edu>
 * @author Pablo Gabriel Picatto <p.picatto@gmail.com>
 */
class TweetMetadata 
{
    /**
     * @ODM\Field(type="int") 
     */
    private $maxId;

    /**
     * @ODM\Field(type="int") 
     */
    private $sinceId;

    /**
     * @ODM\Field(type="int") 
     */
    private $count;

    /**
     * @ODM\ReferenceMany(targetDocument="Documents\Tweet") 
     */
    private $tweet = [];

    /**
     * @param int $maxId
     *
     * @return TweetMetadata
     */
    public function setMaxId($maxId) 
    {
        $this->maxId = $maxId;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxId()
    {
        return $this->maxId;
    }

    /**
     * @param int $sinceId
     *
     * @return TweetMetadata
     */
    public function setSinceId($sinceId) 
    {
        $this->sinceId = $sinceId;

        return $this;
    }

    /**
     * @return int
     */
    public function getSinceId()
    {
        return $this->sinceId;
    }

    /**
     * @param int $count
     *
     * @return TweetMetadata
     */
    public function setCount($count) 
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param Tweet $tweet
     *
     * @return TweetMetadata
     */
    public function setTweet(Tweet $tweet) 
    {
        $this->tweet = $tweet;

        return $this;
    }

    /**
     * @return Tweet
     */
    public function getTweet()
    {
        return $this->tweet;
    }
}
