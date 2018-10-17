<?php

namespace ContentBuilder\Blocks;

interface BuildFieldHtml
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