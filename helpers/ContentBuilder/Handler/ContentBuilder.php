<?php

namespace ContentBuilder\Handler;

use Timber\Timber;

final class ContentBuilder
{
    /**
     * @var object Wordpress post data
     */
    private $_post;

    /**
     * @var array API of Timber
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

        $this->_createContext();
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

                $fieldClassName = 'ContentBuilder\Blocks\Build' . ucfirst(get_row_layout()) . 'Html';
                $fieldClass = new $fieldClassName($this->_context);
                $this->_html .= $fieldClass->buildHtml();
            }
        }
    }

    /**
     * Declare and populate Timber context
     */
    private function _createContext()
    {
        $this->_context = Timber::get_context();
        $this->_context['post'] = $this->_post;
        $this->_context['user'] = new \Timber\User();
    }
}