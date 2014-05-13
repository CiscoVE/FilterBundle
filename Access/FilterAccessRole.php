<?php

namespace CiscoSystems\FilterBundle\Access;

use Symfony\Component\Security\Core\SecurityContext;
use CiscoSystems\FilterBundle\Model\FilterInterface;
use CiscoSystems\FilterBundle\Access\FilterAccessInterface;

class FilterAccessRole implements FilterAccessInterface
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;

    /**
     * Constructor
     */
    public function __construct( SecurityContext $securityContext )
    {
        $this->securityContext = $securityContext;
    }

    /**
     * {@inheritDoc}
     *
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::display()
     */
    public function display( FilterInterface $filter, array $config = array(), $default = NULL )
    {
        foreach ( $config["display"] as $role )
        {
            if ( $this->securityContext->isGranted( $role )) return true;
        }
        return false;
    }

    /**
     * {@inheritDoc}
     *
     * @see \CiscoSystems\FilterBundle\Access\FilterAccessInterface::enable()
     */
    public function enable( FilterInterface $filter, array $config = array(), $default = NULL )
    {
        foreach ( $config["enable"] as $role )
        {
            if ( $this->securityContext->isGranted( $role )) return true;
        }
        return false;
    }
}
