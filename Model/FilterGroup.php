<?php

namespace CiscoSystems\FilterBundle\Model;

use CiscoSystems\FilterBundle\Model\FilterInterface;

class FilterGroup
{
    /**
     * Identifier for this filter group
     *
     * @var string
     */
    protected $name;

    /**
     * Collection of filter elements grouped together
     *
     * @var array
     */
    protected $filters;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterGroup
     */
    public function setName( $name )
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param array $filters
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterGroup
     */
    public function setFilters( array $filters )
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * Add a filter to this group
     */
    public function addFilter( FilterInterface $filter )
    {
        $this->filters[] = $filter;
    }
}
