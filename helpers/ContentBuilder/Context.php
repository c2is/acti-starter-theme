<?php

namespace ContentBuilder;

use Timber\Timber;

final class Context
{
    /**
     * @var array Timber context
     */
    public $context;

    public function __construct()
    {
        /* Init context */
        $this->context = Timber::get_context();
    }

    /**
     * @return array Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set context data
     * @param $data
     */
    public function setContext($data)
    {
        foreach ($data as $key => $value) {
            $this->context[$key] = $value;
        }
    }
}