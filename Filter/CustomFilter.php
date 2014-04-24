<?php

namespace CiscoSystems\FilterBundle\Filter;

use CiscoSystems\FilterBundle\Filter\AbstractFilter;

/**
 * Empty Filter implementation
 */
class CustomFilter extends AbstractFilter
{
    /**
     * @see \CiscoSystems\FilterBundle\Model\FilterInterface::getType()
     */
    public function getType()
    {
        return "custom";
    }
}
