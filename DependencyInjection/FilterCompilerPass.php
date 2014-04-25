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
        // Filter type service definitions
        if ( !$container->hasDefinition( 'cisco.filter' )) return;
        $definition = $container->getDefinition( 'cisco.filter' );
        $taggedServices = $container->findTaggedServiceIds( 'cisco.filtertype' );
        foreach ( $taggedServices as $serviceId => $attributes )
        {
            $class = $this->getFilterClassName( $container, $serviceId, $attributes );
            $definition->addMethodCall(
                'addFilterClass',
                array( $attributes[0]['alias'], $class )
            );
        }
        // Filter configurations
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
    protected function getFilterClassName( ContainerBuilder $container, $serviceId, array $attributes )
    {
        if ( count( $attributes ) < 1 || !array_key_exists( 'alias', $attributes[0] ))
        {
            throw new \Exception( "Filter type service definition invalid, requires 'alias' tag." );
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
