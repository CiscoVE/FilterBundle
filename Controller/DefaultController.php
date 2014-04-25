<?php

namespace CiscoSystems\FilterBundle\Controller;

use CiscoSystems\FilterBundle\Model\FilterDependency;
use CiscoSystems\FilterBundle\Filter\FinancialYearFilter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//         $dep = new FilterDependency();
//         $dep->setType( FilterDependency::TYPE_DISABLE );
        return $this->render( 'CiscoSystemsFilterBundle:Default:index.html.twig' );
    }
}
