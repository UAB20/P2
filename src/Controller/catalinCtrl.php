<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class catalinCtrl extends AbstractController
{
    public function init()
    {
        return $this->render('catalinchinchisan.html.twig');
    }
}    