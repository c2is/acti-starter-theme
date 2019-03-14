<?php

namespace ActiSocialShare;

class ActiSocialShare
{
    /**
     * ActiSocialShare constructor.
     */
    public function __construct()
    {
    }

    public function getFeed($feed)
    {
        $className = '\ActiSocialShare\\';
        $className .= ucfirst($feed);
        $socialShareClass = new $className();

        return $socialShareClass;
    }
}