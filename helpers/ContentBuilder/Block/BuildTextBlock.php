<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Stash\Pool;
use Timber\Timber;

final class BuildTextBlock implements BuildFieldBlock
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
        $html = Timber::compile('partials/flex-blocks/text.twig', $context);

        return $html;
    }

    /**
     * Add block data to context
     */
    public function buildDataContext()
    {
        $blockData = array(
            'text' => get_sub_field('text_text')
        );

        $data = array(
            'data' => $blockData
        );

        $this->_context->setContext($data);
    }
}