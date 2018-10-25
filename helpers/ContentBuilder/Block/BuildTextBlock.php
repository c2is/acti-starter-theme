<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Timber\Timber;

final class BuildTextBlock implements BuildFieldBlock
{
    /**
     * @var Context
     */
    private $_context;

    public function __construct($context)
    {
        $this->_context = $context;
    }

    /**
     * Serve html cache or built it
     *
     * @return string html content of text block
     */
    public function renderHtml()
    {
        $html = $this->buildHtml();

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