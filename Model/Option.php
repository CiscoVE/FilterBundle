<?php

namespace CiscoSystems\FilterBundle\Model;

class Option
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return \CiscoSystems\FilterBundle\Model\Option
     */
    public function setValue( $value )
    {
        $this->value = $value;
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
     * @return \CiscoSystems\FilterBundle\Model\Option
     */
    public function setLabel( $label )
    {
        $this->label = $label;
        return $this;
    }
}
