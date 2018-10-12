<?php

namespace ContentBuilder\Blocks;

use Timber\Timber;

final class BuildTextHtml implements BuildFieldHtml
{
    private $_context;

    public function __construct($context)
    {
        $this->_context = $context;
    }

    /**
     * Twig file : text.twig
     * @return string html content of text block
     */
    public function buildHtml()
    {
        $this->_context['text'] = get_sub_field('text');

        $html = Timber::compile('partials/flex-blocks/text.twig', $this->_context);

        return $html;
    }
}