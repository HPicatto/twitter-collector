<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

namespace Documents;

/**
 * @author Hernan Andres Picatto <hpicatto@uscd.edu>
 * @author Pablo Gabriel Picatto <p.picatto@gmail.com>
 *
 * @ODM\Document
 */
class Tweet
{
    /**
     * @ODM\Id
     */
    private $twitterId;

    /**
     * @ODM\Field(type="string")
     */
    private $text;

    /**
     * @ODM\Field(type="string")
     */
    private $source;

    /**
     * @ODM\Field(type="string")
     */
    private $hashtag;

    /**
     * @ODM\Field(type="string")
     */
    private $geo;

    /**
     * @ODM\Field(type="int") 
     */
    private $retweetCount;

    /**
     * @ODM\Field(type="string")
     */
    private $truncated;

    /**
     * @ODM\Field(type="int") 
     */
    private $replyToUserId;

    /**
     * @ODM\Field(type="int") 
     */
    private $replyToTweetId;

    /**
     * @ODM\Field(type="string")
     */
    private $mediaUrl;

    /**
     * @ODM\Field(type="date")
     */
    private $importedAt;

    /**
     * @ODM\Field(type="date")
     */
    private $createdAt;

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
     * @param string $text
     *
     * @return TweetMetadata
     */
    public function setText($text) 
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $source
     *
     * @return TweetMetadata
     */
    public function setSource($source) 
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param array $hashtag
     *
     * @return TweetMetadata
     */
    public function setHashtag($hashtag) 
    {
        $this->hashtag = $hashtag;

        return $this;
    }

    /**
     * @return array
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * @param string $geo
     *
     * @return TweetMetadata
     */
    public function setGeo($geo) 
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * @return string
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param int $retweetCount
     *
     * @return TweetMetadata
     */
    public function setRetweetCount($retweetCount) 
    {
        $this->retweetCount = $retweetCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getRetweetCount()
    {
        return $this->retweetCount;
    }

    /**
     * @param boolean $truncated
     *
     * @return TweetMetadata
     */
    public function setTruncated($truncated) 
    {
        $this->truncated = $truncated;

        return $this;
    }

    /**
     * @return voolean
     */
    public function getTruncated()
    {
        return $this->truncated;
    }

    /**
     * @param int $replyToUserId
     *
     * @return TweetMetadata
     */
    public function setReplyToUserId($replyToUserId) 
    {
        $this->replyToUserId = $replyToUserId;

        return $this;
    }

    /**
     * @return int
     */
    public function getReplyToUserId()
    {
        return $this->replyToUserId;
    }

    /**
     * @param int $replyToTweetId
     *
     * @return TweetMetadata
     */
    public function setReplyToTweetId($replyToTweetId) 
    {
        $this->replyToTweetId = $replyToTweetId;

        return $this;
    }

    /**
     * @return int
     */
    public function getReplyToTweetId()
    {
        return $this->replyToTweetId;
    }

    /**
     * @param string $mediaUrl
     *
     * @return TweetMetadata
     */
    public function setMediaUrl($mediaUrl) 
    {
        $this->mediaUrl = $mediaUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
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
}
