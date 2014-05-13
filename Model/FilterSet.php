<?php

namespace CiscoSystems\FilterBundle\Model;

use CiscoSystems\FilterBundle\Model\FilterInterface;
use CiscoSystems\FilterBundle\Model\FilterGroup;

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
     * Whether or not this filter set should persist its state across non-successive HTTP requests
     *
     * @var boolean
     */
    protected $persistent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = "";
        $this->filterGroups = array();
        $this->persistent = false;
    }

    /**
     * Add a filter to this set
     *
     * @param \CiscoSystems\FilterBundle\Model\FilterInterface $filter
     * @param string $groupName
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterSet
     */
    public function addFilter( FilterInterface $filter, $groupName = "" )
    {
        if ( !array_key_exists( $groupName, $this->filterGroups ))
        {
            $this->filterGroups[$groupName] = new FilterGroup();
            $this->filterGroups[$groupName]->setName( $groupName );
        }
        $this->filterGroups[$groupName]->addFilter( $filter );
    }

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
     * @return \CiscoSystems\FilterBundle\Model\FilterSet
     */
    public function setName( $name = "" )
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilterGroups()
    {
        return $this->filterGroups;
    }

    /**
     * @return boolean
     */
    public function getPersistent()
    {
        return $this->persistent;
    }

    /**
     * @param boolean $persistent
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterSet
     */
    public function setPersistent( $persistent = false )
    {
        $this->persistent = $persistent;
        return $this;
    }
}
