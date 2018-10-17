<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Timber\Timber;

final class BuildImageBlock implements BuildFieldBlock
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
     * Twig file : image.twig
     * @return string html content of image block
     */
    public function buildHtml()
    {
        $context = $this->_context->getContext();
        $html = Timber::compile('partials/flex-blocks/image.twig', $context, $context['cache']['duration']);

        return $html;
    }

    /**
     * Add block data to context
     */
    public function buildDataContext()
    {
        $blockData = array(
            'image' => get_sub_field('image_image'),
        );

        $data = array(
            'data' => $blockData
        );

        $this->_context->setContext($data);
    }
}