<?php

namespace CiscoSystems\FilterBundle;

use CiscoSystems\FilterBundle\Model\FilterInterface;

class FilterService
{
    protected $configuration;
    protected $filterClasses;

    public function __construct( array $configuration = array() )
    {
        $this->configuration = $configuration;
        $this->filterClasses = array();
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
        $this->filterClasses[$alias] = $className;
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }
}
