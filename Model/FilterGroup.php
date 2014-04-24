<?php

namespace CiscoSystems\FilterBundle\Model;

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
}
