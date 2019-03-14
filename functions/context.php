<?php

add_filter('timber/context', 'addSocialShareToContext');

function addSocialShareToContext($context)
{
    $socialShareClass = new \ActiSocialShare\ActiSocialShare();
    $context['acti_social_share'] = $socialShareClass;

    return $context;
}