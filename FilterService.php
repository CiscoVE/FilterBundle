<?php

namespace CiscoSystems\FilterBundle;

use Symfony\Component\DependencyInjection\ContainerAware;
use CiscoSystems\FilterBundle\Model\FilterInterface;
use CiscoSystems\FilterBundle\Model\FilterSet;

class FilterService extends ContainerAware
{
    protected $configuration;
    protected $accessControlChain;
    protected $filterClasses;

    /**
     * Constructor
     *
     * @param array
     */
    public function __construct( array $configuration = array() )
    {
        $this->configuration = $configuration;
        $this->accessControlChain = array();
        $this->filterClasses = array();
    }

    /**
     * Get a set of filters using the set's name as per YAML configuration
     *
     * @param string $name
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterSet
     */
    public function get( $name )
    {
        foreach ( $this->configuration as $filterSetName => $configuration )
        {
            if ( $filterSetName != $name ) continue;
            $filterSet = new FilterSet();
            $filterSet->setExportable( $configuration['exportable'] );
            $filterSet->setPersistent( $configuration['persistent'] );
            $filterConfigs = $configuration['filters'];
            foreach ( $filterGroupConfigs as $filterGroupName => $filterGroupConfig )
            {
                foreach ( $filterGroupConfig as $filterName => $filterConfig )
                {
                    $filter = $this->createFilter( $filterName, $filterConfig );
                    $filterSet->addFilter( $filter, $filterGroupName );
                }
            }
            return $filterSet;
        }
        throw new \Exception( "No filter set found with given name: " . $name );
    }

    /**
     * Instantiate a filter according to config
     *
     * @param string $name
     * @param array $config
     *
     * @return \CiscoSystems\FilterBundle\Model\FilterInterface
     */
    public function createFilter( $name = "", array $config = array() )
    {
        // instantiate filter objects according to set config
        $filterType = $config['type'];
        $filterClass = $this->filterClasses[$filterType];
        $filter = new $filterClass();
        $filter->setName( $name );
        // check registered access control services for each filter
        $accessControlConfigs = $config['access_control'];
        foreach ( $config['access_control'] as $accessControlAlias => $accessControlConfig )
        {
            if ( !array_key_exists( $accessControlAlias, $this->accessControlChain ))
            {
                throw new \Exception( "Filter access control service alias undefined: " . $accessControlAlias );
            }
            $accessControl = $this->container->get( $this->accessControlChain[$accessControlAlias] );
            $filter->setDisplayed( $accessControl->display( $filter, $accessControlConfig ));
            $filter->setEnabled( $accessControl->enable( $filter, $accessControlConfig ));
        }
        // return filter object
        return $filter;
    }

    /**
     * Announce a filter class to this service
     *
     * @param string $alias
     * @param string $className
     */
    public function addFilterClass( $alias, $className )
    {
        $this->filterClasses[$alias] = $className;
    }

    /**
     * Announce a filter access control service to this service
     *
     * @param string $serviceId
     */
    public function addFilterAccessControlService( $alias, $serviceId )
    {
        $this->accessControlChain[$alias] = $serviceId;
    }

    /**
     * @return array
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}
