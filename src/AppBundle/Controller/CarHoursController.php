<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\CarHours;
use AppBundle\Form\CarHoursType;

/**
 * CarHours controller.
 *
 * @Route("/reports/carhours")
 */
class CarHoursController extends Controller
{

    /**
     * Lists all CarHours entities.
     *
     * @Route("/", name="reports_carhours")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:CarHours')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CarHours entity.
     *
     * @Route("/", name="reports_carhours_create")
     * @Method("POST")
     * @Template("AppBundle:CarHours:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CarHours();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reports_carhours_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a CarHours entity.
     *
     * @param CarHours $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CarHours $entity)
    {
        $form = $this->createForm(new CarHoursType(), $entity, array(
            'action' => $this->generateUrl('reports_carhours_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CarHours entity.
     *
     * @Route("/new", name="reports_carhours_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CarHours();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CarHours entity.
     *
     * @Route("/{id}", name="reports_carhours_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:CarHours')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarHours entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CarHours entity.
     *
     * @Route("/{id}/edit", name="reports_carhours_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:CarHours')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarHours entity.');
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
    * Creates a form to edit a CarHours entity.
    *
    * @param CarHours $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CarHours $entity)
    {
        $form = $this->createForm(new CarHoursType(), $entity, array(
            'action' => $this->generateUrl('reports_carhours_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CarHours entity.
     *
     * @Route("/{id}", name="reports_carhours_update")
     * @Method("PUT")
     * @Template("AppBundle:CarHours:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:CarHours')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarHours entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reports_carhours_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CarHours entity.
     *
     * @Route("/{id}", name="reports_carhours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:CarHours')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CarHours entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reports_carhours'));
    }

    /**
     * Creates a form to delete a CarHours entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reports_carhours_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
