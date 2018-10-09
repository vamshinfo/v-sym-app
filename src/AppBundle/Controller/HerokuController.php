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
        echo "hello";

        $em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT id,Name,FirstName,LastName,Email,MobilePhone FROM salesforce.contact as contact';
        try {
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result);
        $data[$result] = $result;
    	    } 
        catch (\Doctrine\ORM\NoResultException $e) {
             return null;
             var_dump($e);
         }
         return $this->render('AppBundle:Page:my.html.twig', array('contact' => $data));

    //     return array(
    //         'result' => $result,
    //           );
     }

}