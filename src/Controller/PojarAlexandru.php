<?php


namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PojarAlexandru extends AbstractController
{

    public function homepage()
    {
        return $this->render('pojar_alexandru.html.twig');
    }
}
