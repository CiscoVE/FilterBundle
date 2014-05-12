<?php

namespace CiscoSystems\FilterBundle\Access;

use CiscoSystems\FilterBundle\Model\FilterInterface;

interface FilterAccessInterface
{
    /**
     * Determine whether this filter element should be visible
     *
     * @param FilterInterface $filter
     * @param array $config
     * @param string $default
     *
     * @return boolean
     */
    public function display( FilterInterface $filter, array $config = array(), $default = NULL );

    /**
     * Determine whether this filter element should be enabled
     *
     * @param FilterInterface $filter
     * @param array $config
     * @param string $default
     *
     * @return boolean
     */
    public function enable( FilterInterface $filter, array $config = array(), $default = NULL );
}
