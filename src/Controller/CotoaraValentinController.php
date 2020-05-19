<?php


	namespace App\Controller;


	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    class CotoaraValentinController extends AbstractController
    {

        public function PersonalPage(){

            return $this->render('cotoara_valentin.html.twig');
        }
    }
