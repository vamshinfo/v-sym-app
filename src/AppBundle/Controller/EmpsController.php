<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Emps;
use AppBundle\Form\EmpsType;

/**
 * Emps controller.
 *
 * @Route("/emps")
 */
class EmpsController extends Controller
{

    /**
     * Lists all Emps entities.
     *
     * @Route("/", name="emps")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Emps')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Emps entity.
     *
     * @Route("/", name="emps_create")
     * @Method("POST")
     * @Template("AppBundle:Emps:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Emps();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emps_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Emps entity.
     *
     * @param Emps $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Emps $entity)
    {
        $form = $this->createForm(new EmpsType(), $entity, array(
            'action' => $this->generateUrl('emps_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Emps entity.
     *
     * @Route("/new", name="emps_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Emps();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Emps entity.
     *
     * @Route("/{id}", name="emps_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Emps entity.
     *
     * @Route("/{id}/edit", name="emps_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emps entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Emps entity.
    *
    * @param Emps $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Emps $entity)
    {
        $form = $this->createForm(new EmpsType(), $entity, array(
            'action' => $this->generateUrl('emps_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Emps entity.
     *
     * @Route("/{id}", name="emps_update")
     * @Method("PUT")
     * @Template("AppBundle:Emps:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emps')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emps entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('emps_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Emps entity.
     *
     * @Route("/{id}", name="emps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Emps')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Emps entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('emps'));
    }

    /**
     * Creates a form to delete a Emps entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emps_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
