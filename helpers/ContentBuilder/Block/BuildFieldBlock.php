<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;

interface BuildFieldBlock
{

    /**
     * BuildFieldBlock constructor.
     * @param $context Context
     */
    public function __construct($context);

    /**
     * Serve cache html or build it
     * @return string html content
     */
    public function renderHtml();

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