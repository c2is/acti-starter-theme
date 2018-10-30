<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Timber\Timber;

final class BuildVideoBlock implements BuildFieldBlock
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
     * @return string html content of video block
     */
    public function renderHtml()
    {
        $html = $this->buildHtml();

        return $html;
    }

    /**
     * Twig file : video.twig
     * @return string html content of video block
     */
    public function buildHtml()
    {
        $this->buildDataContext();
        $context = $this->_context->getContext();
        $html = Timber::compile('partials/flex-blocks/video.twig', $context);

        return $html;
    }

    /**
     * Add block data to context
     */
    public function buildDataContext()
    {
        $iframe = get_sub_field('video_video');
        $matches = array();
        /* Extract video url from iframe */
        preg_match('/src="([^"]*)"/i', $iframe, $matches) ;

        $blockData = array(
            'video_url' => $matches[1],
        );

        $data = array(
            'data' => $blockData
        );

        $this->_context->setContext($data);
    }
}