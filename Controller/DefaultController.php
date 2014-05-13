<?php

namespace CiscoSystems\FilterBundle\Controller;

use CiscoSystems\FilterBundle\Model\FilterDependency;
use CiscoSystems\FilterBundle\Filter\FinancialYearFilter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//         echo '<pre>';
        $filterSet = $this->get( 'cisco.filter' )->get( 'example' );
        $groups = $filterSet->getFilterGroups();
        foreach ( $groups as $group )
        {
            echo '<p>' . $group->getName() . '</p>';
            foreach ( $group->getFilters() as $filter )
            {
                echo '<p>' . $filter->getName() . '</p>';
            }
        }
        //print_r( $srv->getConfiguration() );
//         echo '</pre>';
        die(); exit;
//         $dep = new FilterDependency();
//         $dep->setType( FilterDependency::TYPE_DISABLE );
        return $this->render( 'CiscoSystemsFilterBundle:Default:index.html.twig' );
    }
}
