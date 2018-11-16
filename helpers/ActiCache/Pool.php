<?php

namespace ActiCache;

use ActiCache\Tool\FormatTool;
use Roots\WPConfig\Config;

final class Pool
{
    /**
     * @var Pool
     */
    private $_pool;

    public function __construct()
    {
        $this->_pool = new \Stash\Pool();

        $this->_setNamespace();
        $this->_setDriver();
    }

    /**
     * Set pool driver from cache options in config file
     */
    private function _setDriver()
    {
        if (defined('CACHE_METHOD'))
        {
            $driverName = Config::get('CACHE_METHOD');
            if ($driverName)
            {
                $options = Config::get('CACHE_OPTIONS');
                $driverClass = 'Stash\Driver\\' . $driverName;
                $driver = new $driverClass($options);
                $this->_pool->setDriver($driver);
            }
        }
    }

    /**
     * Set pool namespace, useful to group cache
     */
    private function _setNamespace()
    {
        if (is_multisite()) {
            $namespace = get_current_site()->site;
        }
        else {
            $namespace = get_bloginfo('name');
        }

        /* Namespace must be alphanumeric only string */
        $this->_pool->setNamespace(FormatTool::camelCase($namespace));
    }

    /**
     * @return Pool
     */
    public function getPool()
    {
        return $this->_pool;
    }
}