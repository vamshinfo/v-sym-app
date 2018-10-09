<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\contact\Contact;
use AppBundle\Form\ContactType;


class HerokuController extends Controller
// {
// 	/**
//      * 
//      * @Route("/my/new", name="heroku")
//      * @Method("POST")
//      * @Template("AppBundle:Contact:new.html.twig")
//      */
//     public function indexAction()
//     {
//         $contact = new Contact();
//         $form = $this->createCreateForm($contact);
//         $form->handleRequest($request);

//         if ($form->isValid()) {
//             $em = $this->getDoctrine()->getManager();
//             $em->persist($contact);
//             $em->flush();

//             return $this->redirect($this->generateUrl('myaction', array('id' => $contact->getId())));
//         }

//         return array(
//             'contact' => $Contact,
//             'form'   => $form->createView(),
//         );
//     }

    /**
     * @Route("/my" name="myaction")
     * @Template()
     */
    public function myAction()
    {
       
        $em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT id,Name,FirstName,LastName,Email,MobilePhone FROM salesforce.contact as contact';
        try {
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $result = $statement->fetchAll();
        // var_dump($result);
    	    } 
        catch (\Doctrine\ORM\NoResultException $e) {
             return null;
            }

          return array('result' => $result);

    }

    



    // /**
    //  * Creates a form to create a Contact contact.
    //  *
    //  * @param Contact $contact The contact
    //  *
    //  * @return \Symfony\Component\Form\Form The form
    //  */
    // private function createCreateForm(Contact $contact)
    // {
    //     $form = $this->createForm(new ContactType(), $contact, array(
    //         'action' => $this->generateUrl('Contact_create'),
    //         'method' => 'POST',
    //     ));

    //     $form->add('submit', 'submit', array('label' => 'Create'));

    //     return $form;
    // }

    // /**
    //  * Displays a form to create a new Contact contact.
    //  *
    //  * @Route("/new", name="Contact_new")
    //  * @Method("GET")
    //  * @Template()
    //  */
    // public function newAction()
    // {
    //     $contact = new Contact();
    //     $form   = $this->createCreateForm($contact);

    //     return array(
    //         'contact' => $contact,
    //         'form'   => $form->createView(),
    //     );
    // }


}
