<?php

namespace ContentBuilder\Blocks;

use ContentBuilder\Context;
use Timber\Timber;

final class BuildTextHtml implements BuildFieldHtml
{
    /**
     * @var Context
     */
    private $_context;

    public function __construct($context)
    {
        $this->_context = $context;

        $this->buildDataContext();
    }

    /**
     * Twig file : text.twig
     * @return string html content of text block
     */
    public function buildHtml()
    {
        $context = $this->_context->getContext();
        $html = Timber::compile('partials/flex-blocks/text.twig', $context, $context['cache']['duration']);

        return $html;
    }

    /**
     * Add block data to context
     */
    public function buildDataContext()
    {
        $blockData = array(
            'text' => get_sub_field('text')
        );

        $data = array(
            'data' => $blockData
        );

        $this->_context->setContext($data);
    }
}