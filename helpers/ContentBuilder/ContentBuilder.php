<?php

namespace ContentBuilder;

use ActiCache\CacheKeys;
use ActiCache\Pool;
use DateInterval;
use DateTime;
use Stash\Invalidation;

final class ContentBuilder
{
    /**
     * @var object Wordpress post data
     */
    private $_post;

    /**
     * @var Context
     */
    private $_context;

    /**
     * @var Pool
     */
    private $_pool;

    /**
     * @var string html of content builder blocks
     */
    private $_html;

    public function __construct($post)
    {
        $this->_post = $post;
        $this->_html = '';
        $this->_context = new Context();
        $this->_pool = new Pool();

        $this->_setGlobalContextData();
        $this->_processLayouts();
    }

    public function getContentHtml()
    {
        return $this->_html;
    }

    private function _processLayouts()
    {
        /** @var \Stash\Pool $pool */
        $pool = $this->_pool->getPool();

        if (have_rows('content_group_builder', $this->_post->ID))
        {
            $blockIndex = 1;
            while (have_rows('content_group_builder', $this->_post->ID))
            {
                the_row();

                /* Set cache only if cache of layout is enabled */
                if (get_sub_field('layout_cache_enable'))
                {
                    $cacheKey = CacheKeys::getLayoutBaseCacheKey($this->_post->ID) . $blockIndex;
                    $cacheDuration = get_sub_field('layout_cache_duration');

                    $cache = $pool->getItem($cacheKey);
                    /* Serve old cache until the new one is generated */
                    $cache->setInvalidationMethod(Invalidation::OLD);
                    $html = $cache->get();
                    if ($cache->isMiss())
                    {
                        $cache->lock();

                        $html = $this->_buildContentHtml();

                        $cache->set($html);
                        if (absint($cacheDuration) > 0) {
                            try {
                                $interval = new DateInterval('PT' . $cacheDuration . 'S');
                                $expireDate = new DateTime();
                                $expireDate->add($interval);
                                $cache->expiresAt($expireDate);
                            } catch (\Exception $e) {
                                var_dump($e);
                                die;
                            }
                        }
                        $pool->save($cache);
                    }
                }
                else {
                    $html = $this->_buildContentHtml();
                }

                $this->_html .= $html;
                $blockIndex++;
            }
        }
    }

    /**
     * Create html with flex content blocks located in theme/partials/flex-blocks/
     *
     * @return string Html content
     */
    private function _buildContentHtml()
    {
        $html = '';
        if (have_rows('content_builder'))
        {
            while (have_rows('content_builder'))
            {
                the_row();

                /* Layout format in ACF field is my_layout, format it to MyLayout */
                $layoutName = str_replace('_', '', ucwords(get_row_layout(), '_'));
                $fieldClassName = 'ContentBuilder\Block\Build' . $layoutName . 'Block';
                $fieldClass = new $fieldClassName($this->_context);
                $html .= $fieldClass->renderHtml();
            }
        }

        return $html;
    }

    /**
     * Populate Timber global context for block
     */
    private function _setGlobalContextData()
    {
        $data = array(
            'post' => $this->_post,
            'user' => new \Timber\User()
        );

        $this->_context->setContext($data);
    }
}