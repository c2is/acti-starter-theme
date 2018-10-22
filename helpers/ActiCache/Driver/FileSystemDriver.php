<?php

namespace ActiCache\Driver;

use Stash\Driver\FileSystem;

class FileSystemDriver extends FileSystem
{
    public function __construct(array $options = array())
    {
        parent::__construct($options);
    }

    public function setOptions(array $options = array())
    {
        parent::setOptions($options);
    }
}