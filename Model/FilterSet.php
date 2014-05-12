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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = "";
        $this->filterGroups = array();
        $this->exportable = false;
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
    public function addFilter( FilterInterface $filter, string $groupName = "" )
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
    public function setName( string $name = "" )
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
    public function getExportable()
    {
        return $this->exportable;
    }

    /**
     * @param boolean $exportable
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterSet
     */
    public function setExportable( $exportable = false )
    {
        $this->exportable = $exportable;
        return $this;
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
