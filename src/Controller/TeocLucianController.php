<?php


	namespace App\Controller;


	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    class TeocLucianController extends AbstractController
    {

        public function personalPage(){

            return $this->render('teoc_lucian.html.twig');
        }
    }
