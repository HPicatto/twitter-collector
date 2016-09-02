<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

namespace Documents;

/**
 * @author Hernan Andres Picatto <hpicatto@uscd.edu>
 * @author Pablo Gabriel Picatto <p.picatto@gmail.com>
 */
class User
{
    /**
     * @ODM\Field(type="int") 
     */
    private $twitterId;

    /**
     * @ODM\Field(type="string") 
     */
    private $name;

    /**
     * @ODM\Field(type="string") 
     */
    private $screenName;

    /**
     * @ODM\Field(type="string") 
     */
    private $location;

    /**
     * @ODM\Field(type="int") 
     */
    private $followersCount;

    /**
     * @ODM\Field(type="int") 
     */
    private $followingCount;

    /**
     * @ODM\Field(type="string") 
     */
    private $profileImageUrl;

    /**
     * @ODM\Field(type="int")
     */
    private $tweetAndRetweetCount;

    /**
     * @ODM\Field(type="boolean")
     */
    private $defaultProfile;

    /**
     * @ODM\Field(type="date") 
     */
    private $importedAt;

    /**
     * @ODM\Field(type="date") 
     */
    private $createdAt;

    /**
     * @ODM\ReferenceMany(targetDocument="Documents\Tweet") 
     */
    private $tweet = [];

    /**
     * @param int $twitterId
     *
     * @return TweetMetadata
     */
    public function setTwitterId($twitterId) 
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * @return int
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * @param string $name
     *
     * @return TweetMetadata
     */
    public function setName($name) 
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $screenName
     *
     * @return TweetMetadata
     */
    public function setScreenName($screenName) 
    {
        $this->screenName = $screenName;

        return $this;
    }

    /**
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * @param string $location
     *
     * @return TweetMetadata
     */
    public function setLocation($location) 
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param int $followersCount
     *
     * @return TweetMetadata
     */
    public function setFollowersCount($followersCount) 
    {
        $this->followersCount = $followersCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getFollowersCount()
    {
        return $this->followersCount;
    }

    /**
     * @param int $followingCount
     *
     * @return TweetMetadata
     */
    public function setFollowingCount($followingCount) 
    {
        $this->followingCount = $followingCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getFollowingCount()
    {
        return $this->followingCount;
    }

    /**
     * @param string $profileImageUrl
     *
     * @return TweetMetadata
     */
    public function setProfileImageUrl($profileImageUrl) 
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileImageUrl()
    {
        return $this->profileImageUrl;
    }

    /**
     * @param int $tweetAndRetweetCount
     *
     * @return TweetMetadata
     */
    public function setTweetAndRetweetCount($tweetAndRetweetCount) 
    {
        $this->tweetAndRetweetCount = $tweetAndRetweetCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTweetAndRetweetCount()
    {
        return $this->tweetAndRetweetCount;
    }

    /**
     * @param boolean $defaultProfile
     *
     * @return TweetMetadata
     */
    public function setDefaultProfile($defaultProfile) 
    {
        $this->defaultProfile = $defaultProfile;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDefaultProfile()
    {
        return $this->defaultProfile;
    }

    /**
     * @param \DateTime $importedAt
     *
     * @return TweetMetadata
     */
    public function setImportedAt($importedAt) 
    {
        $this->importedAt = $importedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getImportedAt()
    {
        return $this->importedAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return TweetMetadata
     */
    public function setCreatedAt($createdAt) 
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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