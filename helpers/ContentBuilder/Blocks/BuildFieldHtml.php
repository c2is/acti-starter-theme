<?php

namespace ContentBuilder\Blocks;

interface BuildFieldHtml
{

    public function __construct($context);

    public function buildHtml();

    public function buildDataContext();

}