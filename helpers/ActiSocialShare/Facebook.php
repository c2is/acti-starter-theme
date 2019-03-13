<?php

namespace ActiSocialShare;

final class Facebook extends ActiSocialShare implements ActiSocialShareInterface
{
    /**
     * Return Facebook share url
     *
     * @return string url
     */
    public function getShareUrl()
    {
        $postUrl = get_permalink($this->_post);
        $facebookUrl = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s', $postUrl);

        return $facebookUrl;
    }
}