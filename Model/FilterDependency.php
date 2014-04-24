<?php

namespace CiscoSystems\FilterBundle\Model;

use CiscoSystems\FilterBundle\Model\FilterInterface;
use \ReflectionClass;
use \Exception;

class FilterDependency
{
    const TYPE_DISABLE = "disable";
    const TYPE_ENABLE = "enable";
    const TYPE_LIMIT = "limit";
    const TYPE_RESET = "reset";

    /**
     * Type of dependency
     *
     * @var const
     */
    protected $type;

    /**
     * Referenced filter
     *
     * @var \CiscoSystems\FilterBundle\Model\FilterInterface
     */
    protected $filter;

    /**
     * @return const
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param const $type
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterDependency
     */
    public function setType( $type )
    {
        if ( !in_array( $type, (new ReflectionClass( $this ))->getConstants() ))
        {
            throw new Exception( "Parameter must be a valid constant of FilterDependency class" );
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return \CiscoSystems\FilterBundle\Model\FilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param \CiscoSystems\FilterBundle\Model\FilterInterface $filter
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterDependency
     */
    public function setFilter( FilterInterface $filter )
    {
        $this->filter = $filter;
        return $this;
    }
}
