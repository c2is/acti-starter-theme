<?php

namespace ContentBuilder\Blocks;

use Timber\Timber;

final class BuildImageHtml implements BuildFieldHtml
{
    private $_context;

    public function __construct($context)
    {
        $this->_context = $context;
    }

    /**
     * Twig file : image.twig
     * @return string html content of image block
     */
    public function buildHtml()
    {
        $this->_context['data'] = $this->buildDataContext();

        $html = Timber::compile('partials/flex-blocks/image.twig', $this->_context);

        return $html;
    }

    /**
     * @return array context block data
     */
    public function buildDataContext()
    {
        $data = array(
            'image' => get_sub_field('image'),
        );

        return $data;
    }
}