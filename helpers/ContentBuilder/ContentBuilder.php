<?php

namespace ContentBuilder;

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
     * @var string html of content builder blocks
     */
    private $_html;

    public function __construct($post)
    {
        $this->_post = $post;
        $this->_html = '';
        $this->_context = new Context();

        $this->_setGlobalContextData();
        $this->_buildContentHtml();
    }

    public function getContentHtml()
    {
        return $this->_html;
    }

    /**
     * Populate html with flex content blocks located in theme/partials/flex-blocks/
     */
    private function _buildContentHtml()
    {
        if (have_rows('content_builder', $this->_post->ID))
        {
            while (have_rows('content_builder', $this->_post->ID))
            {
                the_row();

                $this->_setCacheContext();

                /* Layout format in ACF field is my_layout, format it to MyLayout */
                $layoutName = str_replace('_', '', ucwords(get_row_layout(), '_'));
                $fieldClassName = 'ContentBuilder\Block\Build' . $layoutName . 'Block';
                $fieldClass = new $fieldClassName($this->_context);
                $this->_html .= $fieldClass->buildHtml();
            }
        }
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

    /**
     * Populate Timber cache context for block
     */
    private function _setCacheContext()
    {
        $cacheContext = array(
            'enabled' => get_sub_field('block_cache_enable'),
            'duration' => false
        );

        /* Set cache duration only if cache of block is enabled */
        if (get_sub_field('block_cache_enable')) {
            $cacheContext['duration'] = get_sub_field('block_cache_duration');
        }

        $data = array(
            'cache' => $cacheContext
        );

        $this->_context->setContext($data);
    }
}