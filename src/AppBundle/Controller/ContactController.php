<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;





/**
 * Contact controller.
 *
 * @Route("/contact")
 */

class ContactController extends Controller
{

    /**
     * contact home_page
     *
     * @Route("/", name="contact_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();


        $form = $this->createFormBuilder($contact)
            ->add('name', TextType::class, array('label'=> 'nom'))
            ->add('email', TextType::class, array('label'=> 'email'))
            ->add('subject', TextType::class, array('label'=> 'sujet'))
            ->add('message', TextareaType::class, array('label'=> 'message'))
            ->add('Save', SubmitType::class, array('label'=> 'envoyer'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            //return $this->redirectToRoute('task_success'); Doc de symfony
        }
        return $this->render('contact/index.html.twig', array(
            'form' =>$form->createView(),
        ));
    }



}