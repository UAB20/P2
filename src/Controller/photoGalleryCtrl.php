<?php
namespace App\Controller;
use App\Entity\PhotoGalleryPost;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType; 



use AppBundle\Entity\Student; 
use AppBundle\Form\FormValidationType; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 


class photoGalleryCtrl extends AbstractController
{
    
    public function init()
    {
        // $photos = $this->getDoctrine()->getRepository(photoGalleryPost::class)->find();
        $repository = $this->getDoctrine()->getRepository(photoGalleryPost::class);
        $photos = $repository->findAll();
         return $this->render('photoGalleryCC.html.twig', ['photos' => $photos]);
        //return $this->render('photoGalleryCC.html.twig');
    }

    public function photoPreview( $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $previewData = $entityManager->getRepository(photoGalleryPost::class)->find($id);
        
       
        return $this->render('photoGallery/photoPreview.html.twig',
            ['previewData' => $previewData]);
        return;
    }
    public function newImage(Request $request) {
        $newPhotoPost = $this->createFormBuilder()
            ->add('photo', FileType::class,['label' => 'Photo (png, jpeg)']) 
            
            ->add('postTitle', TextType::class, ['label' => 'Title'])
            ->add('submit', SubmitType::class, ['label' => 'Save'])
            ->getForm();

        $newPhotoPost->handleRequest($request);

        if( $newPhotoPost->isSubmitted() && $newPhotoPost->isValid() ) {

            $formData = $newPhotoPost->getData();
            $newPost = new PhotoGalleryPost();


            $file = $formData['photo']; 
            $fileName = md5(uniqid()).'.'.$file->guessExtension(); 
            $fileName = md5(uniqid()).'.jpg'; 
            $file->move($this->getParameter('photos_directory'), $fileName);  

            $entityManager = $this->getDoctrine()->getManager();
            $newPost->setTitle($formData['postTitle']);
            $newPost->setPath('photos_directory/'.$fileName);
            $newPost->setDate(new \DateTime());
            $entityManager->persist($newPost);
            $entityManager->flush();

            return $this->redirectToRoute('photoGallery');

        }

        return $this->render('photoGallery/newPost.html.twig',
            ['newPhotoPost' => $newPhotoPost->createView()]);
    }

    public function goToEdit (Request $request, $id) {

        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository(photoGalleryPost::class)->find($id);
        $editForm = $this->createFormBuilder()
            ->add('postTitle', TextType::class, ['label' => 'Title','empty_data' => $post->getTitle()])
            ->add('submit', SubmitType::class, ['label' => 'Update'])
            ->getForm();

        $editForm->handleRequest($request);

        if( $editForm->isSubmitted() && $editForm->isValid() ) {

            $formData = $editForm->getData();

            $post->setTitle($formData['postTitle']);
            $entityManager->flush();

            return $this->redirectToRoute('photoGallery');

        }
        return $this->render('photoGallery/editPost.html.twig',
            ['editForm' => $editForm->createView(),'post' => $post]);
    }

    public function delete($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $this->getDoctrine()->getRepository(photoGalleryPost::class)->find($id);
        $entityManager->remove($post);
        $entityManager->flush();
        return $this->redirectToRoute('photoGallery');
    }
}    