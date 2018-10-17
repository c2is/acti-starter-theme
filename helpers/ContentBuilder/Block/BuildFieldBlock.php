<?php

namespace ContentBuilder\Block;

interface BuildFieldBlock
{

    public function __construct($context);

    /**
     * Compile Twig block
     * return string html content
     */
    public function buildHtml();

    /**
     * Add block data to context
     */
    public function buildDataContext();

}