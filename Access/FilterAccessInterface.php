<?php

namespace CiscoSystems\FilterBundle\Access;

use CiscoSystems\FilterBundle\Model\FilterInterface;

interface FilterAccessInterface
{
    /**
     * Determine whether this filter element should be visible
     *
     * @param FilterInterface $filter
     * @param string $default
     *
     * @return boolean
     */
    public function show( FilterInterface $filter, $default = NULL );

    /**
     * Determine whether this filter element should be enabled
     *
     * @param FilterInterface $filter
     * @param string $default
     *
     * @return boolean
     */
    public function enable( FilterInterface $filter, $default = NULL );
}
