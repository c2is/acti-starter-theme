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
     * Twig file : image.twig
     * @return string html content of image block
     */
    public function buildHtml()
    {
        $this->buildDataContext();
        $context = $this->_context->getContext();
        $html = Timber::compile('partials/flex-blocks/image.twig', $context);

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