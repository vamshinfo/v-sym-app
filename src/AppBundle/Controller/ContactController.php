<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContactController extends Controller
{
    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction()
    {
       	$em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT id,Name,FirstName,LastName,Email,MobilePhone FROM salesforce.contact as contact';
        try {
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result);

    	    } 
        catch (\Doctrine\ORM\NoResultException $e) {
             return null;
            }

          return $this->render('AppBundle:Page:show.html.twig', array('result' => $result));
    }
    
}
