<?php

namespace CiscoSystems\FilterBundle\Model;

use CiscoSystems\FilterBundle\Model\Option;

class OptionGroup
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $options;

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
     * @return \CiscoSystems\FilterBundle\Model\OptionGroup
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
     * @return \CiscoSystems\FilterBundle\Model\OptionGroup
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
     * @return \CiscoSystems\FilterBundle\Model\OptionGroup
     */
    public function setOptions( array $options )
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param \CiscoSystems\FilterBundle\Model\Option $option
     *
     * @return \CiscoSystems\FilterBundle\Model\OptionGroup
     */
    public function addOption( Option $option )
    {
        $this->options[] = $option;
        return $this;
    }
}
