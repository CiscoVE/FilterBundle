<?php

namespace CiscoSystems\FilterBundle\Model;

interface FilterInterface
{
    /**
     * Load option data
     */
    public function load();

    /**
     * Get type identifier
     *
     * @return string
     */
    public function getType();
}
