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
        $psauths = $this->getDoctrine()
            ->getRepository(PsAuths::class)
            ->findAll();
    
            if (!$psauths) {
                return new Response( "Aún no hay extensiones creadas");
            }
     
        return $this->render('extension/index.html.twig',
            ['psauths' => $psauths,]
        );
    }

    /**
     * @Route("/newextension", name="newextension")
     */
    public function NewExtension(Request $request)
    {         
        $form = $this->createFormBuilder(array())
        ->add('Usuario', TextType::class)
        ->add('Contrasena', TextType::class)
        ->add('Registros_Maximos', TextType::class)
        ->add('Crear', SubmitType::class)
        ->getForm();
 
       
        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();            
           
            $psaors = new PsAors();
            $psaors->setId($data['Usuario']);
            $psaors->setMaxContacts($data['Registros_Maximos']);
            $em->persist($psaors);

            $psauths = new PsAuths();
            $psauths->setId($data['Usuario']);
            $psauths->setAuthType('userpass');
            $psauths->setPassword($data['Contrasena']);
            $psauths->setUsername($data['Usuario']);
            $em->persist($psauths);

            $psendpoints = new PsEndpoints();
            $psendpoints->setId($data['Usuario']);
            $psendpoints->setTransport('transport-udp');
            $psendpoints->setAors($data['Usuario']);
            $psendpoints->setAuth($data['Usuario']);
            $psendpoints->setContext('reclutas-pbx');
            $psendpoints->setDisallow('all');
            $psendpoints->setAllow('ulaw');
            $psendpoints->setDirectMedia('no');
            $em->persist($psendpoints);

            $em->flush();
         
            return new Response( "Extensión creada");
        }
        else{
            return $this->render('extension/new_extension.html.twig', 
                ['form' => $form->createView(),]
            );
        }
    }

    /**
     * @Route("/deleteextension{id}", name="deleteextension")
     */
    public function DeleteExtension($id)
    {
        $psauths = $this->getDoctrine()
            ->getRepository(PsAuths::class)
            ->findOneById( $id );
		        
        $em = $this->getDoctrine()
            ->getManager();

        $em->remove($psauths);
        $em->flush($psauths); 
        
        return new Response('Extensión '. $id . ' eliminada');    
    }

    /**
     * @Route("/editextension{id}", name="editextension")
     */
    public function EditExtension(Request $request, $id)
    {         
        $psaors = $this->getDoctrine()
        ->getRepository(PsAors::class)
        ->findOneById($id);

        $psauths = $this->getDoctrine()
        ->getRepository(PsAuths::class)
        ->findOneById($id);

        $psendpoints = $this->getDoctrine()
        ->getRepository(PsEndpoints::class)
        ->findOneById($id);
         
       
         
        $formData = ['Usuario' => $psaors->getId(), 
                    'Contrasena' => $psauths->getPassword(), 
                    'description' => $psaors->setMaxContacts('Registros_Maximos'),
                ];
      

        
        $form = $this->createFormBuilder($formData)
        ->add('Usuario', TextType::class)
        ->add('Contrasena', TextType::class)
        ->add('Registros_Maximos', TextType::class)
        ->add('Crear', SubmitType::class)
        ->getForm();
         
         
              
        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();            
           
            $psaors = new PsAors();
            $psaors->setId($data['Usuario']);
            $psaors->setMaxContacts($data['Registros_Maximos']);
            $em->persist($psaors);

            $psauths = new PsAuths();
            $psauths->setId($data['Usuario']);
            $psauths->setAuthType('userpass');
            $psauths->setPassword($data['Contrasena']);
            $psauths->setUsername($data['Usuario']);
            $em->persist($psauths);

            $psendpoints = new PsEndpoints();
            $psendpoints->setId($data['Usuario']);
            $psendpoints->setTransport('transport-udp');
            $psendpoints->setAors($data['Usuario']);
            $psendpoints->setAuth($data['Usuario']);
            $psendpoints->setContext('reclutas-pbx');
            $psendpoints->setDisallow('all');
            $psendpoints->setAllow('ulaw');
            $psendpoints->setDirectMedia('no');
            $em->persist($psendpoints);

            $em->flush();
         
            return new Response( "Extensión editada");
        }
        else{
            return $this->render('extension/edit_extension.html.twig', 
                ['form' => $form->createView(),]
            );
        }
    }
}
