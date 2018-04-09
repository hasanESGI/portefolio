<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;





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
    public function indexAction()
    {
        return $this->render('contact/index.html.twig');
    }

}