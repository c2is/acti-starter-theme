<?php

namespace ContentBuilder\Block;

use ContentBuilder\Context;
use Stash\Pool;

interface BuildFieldBlock
{

    /**
     * BuildFieldBlock constructor.
     * @param $context Context
     * @param $pool Pool cache handling
     */
    public function __construct($context, $pool);

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