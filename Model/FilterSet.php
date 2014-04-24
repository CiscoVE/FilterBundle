<?php

namespace CiscoSystems\FilterBundle\Model;

class FilterSet
{
    /**
     * Identifier for this filter set
     *
     * @var string
     */
    protected $name;

    /**
     * Collection of filter groups
     *
     * @var array
     */
    protected $filterGroups;

    /**
     * Whether or not this filter set should offer an export option
     *
     * @var boolean
     */
    protected $exportable;

    /**
     * Whether or not this filter set should persist its state between HTTP GET requests
     *
     * @var boolean
     */
    protected $persistent;
}
