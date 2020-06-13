<?php

namespace App\Controller;

use App\Entity\PsAors;
use App\Entity\PsAuths;
use App\Entity\PsEndpoints;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ExtensionController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('extension/index.html.twig', [
            'controller_name' => 'ExtensionController',
        ]);
    }

    /**
     * @Route("/newextension", name="newextension")
     */
    public function ExtensionForm( Request $request )
    {         
        $form = $this->createFormBuilder(array())
        ->add('username', TextType::class)
        ->add('password', TextType::class)
        ->add('max_contacts', TextType::class)
        ->add('Send', SubmitType::class)
        ->getForm();
 
       
        $form->handleRequest( $request );

         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();            
           
            $psaors = new PsAors();
            $psaors->setId($data['username']);
            $psaors->setMaxContacts($data['max_contacts']);
            $em->persist($psaors);

            $psauths = new PsAuths();
            $psauths->setId($data['username']);
            $psauths->setAuthType('userpass');
            $psauths->setPassword($data['password']);
            $psauths->setUsername($data['username']);
            $em->persist($psauths);

            $psendpoints = new PsEndpoints();
            $psendpoints->setId($data['username']);
            $psendpoints->setTransport('transport-udp');
            $psendpoints->setAors($data['username']);
            $psendpoints->setAuth($data['username']);
            $psendpoints->setContext('reclutas-pbx');
            $psendpoints->setDisallow('all');
            $psendpoints->setAllow('ulaw');
            $psendpoints->setDirectMedia('no');
            $em->persist($psendpoints);

            $em->flush();
         
            return new Response( "Save");
        }
        else{
            return $this->render('extension/newextension.html.twig', 
            ['form' => $form->createView()]);
        }
    }
}
