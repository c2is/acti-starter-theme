<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Stash\Pool;
use Timber\Timber;

final class BuildPushPostBlock implements BuildFieldBlock
{
    /**
     * @var Context
     */
    private $_context;

    /**
     * @var Pool
     */
    private $_pool;

    public function __construct($context, $pool)
    {
        $this->_context = $context;
        $this->_pool = $pool;
    }

    /**
     * Serve html cache or built it
     *
     * @return string html content of text block
     */
    public function renderHtml()
    {
        $cacheContext = $this->_context->getContext()['cache'];
        $cacheIsActive = $cacheContext['enabled'];

        if ($cacheIsActive)
        {
            $cache = $this->_pool->getItem($cacheContext['key']);
            $html = $cache->get();
            if ($cache->isMiss())
            {
                $cache->lock();

                $html = $this->buildHtml();

                $cache->set($html);
                if (absint($cacheContext['duration']) > 0) {
                    $cache->expiresAfter($cacheContext['duration']);
                }
                $this->_pool->save($cache);
            }
        }
        else {
            $html = $this->buildHtml();
        }

        return $html;
    }

    /**
     * Twig file : text.twig
     * @return string html content of text block
     */
    public function buildHtml()
    {
        $this->buildDataContext();
        $context = $this->_context->getContext();
        $html = Timber::compile('partials/flex-blocks/push-post.twig', $context, $context['cache']['duration']);

        return $html;
    }

    /**
     * Add block data to context
     */
    public function buildDataContext()
    {
        $blockData = array(
            'posts' => $this->_getPostsToPush()
        );

        $data = array(
            'data' => $blockData
        );

        $this->_context->setContext($data);
    }

    /**
     * Retrieve posts to push based on block parameters
     * @return array posts to push
     */
    private function _getPostsToPush()
    {
        $postTypes = get_sub_field('push_post_type');
        $categories = get_sub_field('push_post_category');
        $number = get_sub_field('push_post_number');
        $order = get_sub_field('push_post_order');
        $orderBy = get_sub_field('push_post_order_by');
        $postArgs = array(
            'posts_per_page' => $number,
            'category' => $categories,
            'orderby' => $orderBy,
            'order' => $order,
            'post_type' => $postTypes
        );

        $posts = get_posts($postArgs);

        return $posts;
    }
}