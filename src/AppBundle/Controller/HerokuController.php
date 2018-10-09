<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HerokuController extends Controller
{
    /**
     * @Route("/my")
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
        	    } 
        catch (\Doctrine\ORM\NoResultException $e) {
             return null;
            }

          return array('result' => $result);

    }

    // /**
    //  * 
    //  * @Route("/", name="heroku")
    //  * @Method("GET")
    //  * @Template()
    //  */
    // public function indexAction()
    // {
    //     $contact = new Person();
    //     $form = $this->createCreateForm($contact);
    //     $form->handleRequest($request);

    //     if ($form->isValid()) {
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($contact);
    //         $em->flush();

    //         return $this->redirect($this->generateUrl('person_show', array('id' => $entity->getId())));
    //     }

    //     return array(
    //         'entity' => $entity,
    //         'form'   => $form->createView(),
    //     );
    // }

}
