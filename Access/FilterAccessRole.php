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
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::display()
     */
    public function display( FilterInterface $filter, array $config = array(), $default = NULL )
    {
        // TODO
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::enable()
     */
    public function enable( FilterInterface $filter, array $config = array(), $default = NULL )
    {
        // TODO
        return true;
    }
}
