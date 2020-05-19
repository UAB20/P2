<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PojarAlexandru extends AbstractController
{
    
    public function index() {
        return $this->render('pojar_alexandru.html.twig');
    }
}
