<?php

namespace CiscoSystems\FilterBundle\Filter;

use CiscoSystems\FilterBundle\Model\FilterInterface;

/**
 * Abstract class to be extended by Filter implementations
 */
abstract class AbstractFilter implements FilterInterface
{
    /**
     * Name of the filter element
     *
     * @var string
     */
    protected $name;

    /**
     * Label for the filter element
     *
     * @var string
     */
    protected $label;

    /**
     * Associative array (key: option value, value: option label)
     *
     * @var array
     */
    protected $options;

    /**
     * Names of filters depending on this filter (for enable/disable/limit/reset)
     *
     * @var array
     */
    protected $dependants;

    /**
     * Names of filters this filter depends on (for enable/disable/limit/reset)
     *
     * @var array
     */
    protected $dependencies;

    /**
     * Whether or not this filter allows multiple selections
     *
     * @var boolean
     */
    protected $multiple;

    /**
     * Access level required to use this filter
     *
     * @var integer
     */
    protected $accessLevel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = "";
        $this->label = "";
        $this->options = array();
        $this->dependants = array();
        $this->dependencies = array();
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
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setName( string $name )
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setLabel( string $label )
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setOptions( array $options )
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getDependants()
    {
        return $this->dependants;
    }

    /**
     * @param array $dependants
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setDependants( array $dependants )
    {
        $this->dependants = $dependants;
        return $this;
    }

    /**
     * @return the array
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @param array $dependencies
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setDependencies( array $dependencies )
    {
        $this->dependencies = $dependencies;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param boolean $multiple
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setMultiple( $multiple )
    {
        $this->multiple = $multiple ? true : false;
        return $this;
    }

    /**
     * @return integer
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * @param integer $accessLevel
     *
     * @return \CiscoSystems\FilterBundle\Filter\AbstractFilter
     */
    public function setAccessLevel( $accessLevel )
    {
        $this->accessLevel = $accessLevel;
        return $this;
    }

}
