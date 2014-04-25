<?php

namespace CiscoSystems\FilterBundle;

use CiscoSystems\FilterBundle\Model\FilterInterface;

class FilterService
{
    protected $filterClasses;

    public function __construct()
    {
        $this->$filterClasses = array();
    }

    /**
     * Get a set of filters using the set's name as per YAML configuration
     *
     * @param string $name
     */
    public function get( $name )
    {
    }

    /**
     */
    public function addFilterClass( $alias, $className )
    {
        $this->$filterClasses[$alias] = $className;
    }
}
