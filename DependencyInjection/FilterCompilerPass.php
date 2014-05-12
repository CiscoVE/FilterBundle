<?php

namespace CiscoSystems\FilterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\HttpKernel\KernelInterface;

class FilterCompilerPass implements CompilerPassInterface
{
    protected $kernel;
    protected $parameter;

    public function __construct( $kernel )
    {
        $this->kernel = $kernel;
        $this->parameter = 'cisco.filter.config';
    }

    public function process( ContainerBuilder $container )
    {
        // Get main filter service definition
        if ( !$container->hasDefinition( 'cisco.filter' )) return;
        $definition = $container->getDefinition( 'cisco.filter' );
        // Get filter type service definitions
        $taggedServices = $container->findTaggedServiceIds( 'cisco.filter.filtertype' );
        foreach ( $taggedServices as $serviceId => $attributes )
        {
            $class = $this->getServiceClassName( $container, $serviceId, $attributes );
            $definition->addMethodCall(
                'addFilterClass',
                array( $attributes[0]['alias'], $class )
            );
        }
        // Get filter access control service definitions
        $taggedServices = $container->findTaggedServiceIds( 'cisco.filter.filteraccess' );
        foreach ( $taggedServices as $serviceId => $attributes )
        {
            $this->getServiceClassName( $container, $serviceId, $attributes ); // call only to check for valid alias
            $definition->addMethodCall(
                'addFilterAccessControlService',
                array( $attributes[0]['alias'], $serviceId )
            );
        }
        // Read filter configurations
        $config = $this->getFilterConfigurations();
        $container->setParameter( $this->parameter, $config );
//         echo '<pre>';
//         print_r( $config );
//         echo '</pre>';
//         die(); exit;
    }

    /**
     * Get class name from valid service definition
     *
     * @param ContainerBuilder $container
     * @param string $serviceId
     * @param array $attributes
     * @throws \Exception
     * @return string
     */
    protected function getServiceClassName( ContainerBuilder $container, $serviceId, array $attributes )
    {
        if ( count( $attributes ) < 1 || !array_key_exists( 'alias', $attributes[0] ))
        {
            throw new \Exception( "Service definition invalid, requires 'alias' tag." );
        }
        $class = $container->getDefinition( $serviceId )->getClass();
        if ( false !== strpos( $class, '%' ))
        {
            $class = $container->getParameter( str_replace( '%', '', $class ));
        }
        if ( !class_exists( $class ))
        {
            throw new \Exception( "Service class " . $class . " is not defined." );
        }
        return $class;
    }

    /**
     * Get filter configurations from all registered bundles
     */
    protected function getFilterConfigurations()
    {
        $yaml = new Parser();
        $bundles = $this->kernel->getBundles();
        $filterConfigurations = array();
        foreach ( $bundles as $bundle )
        {
            $file = $bundle->getPath()
                  . DIRECTORY_SEPARATOR . 'Resources'
                  . DIRECTORY_SEPARATOR . 'config'
                  . DIRECTORY_SEPARATOR . 'filters.yml';
            if ( !file_exists( $file )) continue;
            $filterConfig = $yaml->parse( file_get_contents( $file ));
            $filterConfigurations = array_merge( $filterConfigurations, $filterConfig['parameters'][$this->parameter] );
        }
        return $filterConfigurations;
    }
}
