<?php

namespace CiscoSystems\FilterBundle\Access;

use CiscoSystems\FilterBundle\Model\FilterInterface;
use CiscoSystems\FilterBundle\Access\FilterAccessInterface;

class FilterAccessRole implements FilterAccessInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     *
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::show()
     */
    public function show( FilterInterface $filter, $default = NULL )
    {
    }

    /**
     * {@inheritDoc}
     *
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::enable()
     */
    public function enable( FilterInterface $filter, $default = NULL )
    {
    }
}
