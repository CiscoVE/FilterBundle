<?php

namespace CiscoSystems\FilterBundle\Twig\Extension;

use Twig_Extension;
use Twig_Function_Method;
use CiscoSystems\FilterBundle\FilterService;

class FilterExtension extends Twig_Extension
{
    protected $filterService;
    protected $twig;

    public function __construct( FilterService $filterService, $twig )
    {
        $this->filterService = $filterService;
        $this->twig = $twig;
    }

    public function getName()
    {
        return 'filter_extension';
    }

    public function getFunctions()
    {
        return array(
            'filters' => new Twig_Function_Method( $this, 'renderFilterSet', array( 'is_safe' => array( 'html' ), )),
        );
    }

    public function renderFilterSet( $name )
    {
        $filterSet = $this->filterService->get( $name );
        return $this->twig->render(
            'CiscoSystemsFilterBundle:Filter:filterset.html.twig',
            array( 'filterSet' => $filterSet, )
        );
    }
}