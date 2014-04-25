<?php

namespace CiscoSystems\FilterBundle;

use CiscoSystems\FilterBundle\DependencyInjection\FilterCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelInterface;

class CiscoSystemsFilterBundle extends Bundle
{
    protected $kernel;

    public function __construct( KernelInterface $kernel )
    {
        $this->kernel = $kernel;
    }

    public function build( ContainerBuilder $container )
    {
        parent::build( $container );
        $container->addCompilerPass( new FilterCompilerPass( $this->kernel ));
    }
}
