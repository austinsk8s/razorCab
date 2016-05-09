<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\DriverPayroll;
use AppBundle\Form\DriverPayrollType;

/**
 * DriverPayroll controller.
 *
 * @Route("/reports/driverpayroll")
 */
class DriverPayrollController extends Controller
{

    /**
     * Lists all DriverPayroll entities.
     *
     * @Route("/", name="reports_driverpayroll")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:DriverPayroll')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DriverPayroll entity.
     *
     * @Route("/", name="reports_driverpayroll_create")
     * @Method("POST")
     * @Template("AppBundle:DriverPayroll:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DriverPayroll();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reports_driverpayroll_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DriverPayroll entity.
     *
     * @param DriverPayroll $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DriverPayroll $entity)
    {
        $form = $this->createForm(new DriverPayrollType(), $entity, array(
            'action' => $this->generateUrl('reports_driverpayroll_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DriverPayroll entity.
     *
     * @Route("/new", name="reports_driverpayroll_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DriverPayroll();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DriverPayroll entity.
     *
     * @Route("/{id}", name="reports_driverpayroll_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DriverPayroll')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DriverPayroll entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DriverPayroll entity.
     *
     * @Route("/{id}/edit", name="reports_driverpayroll_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DriverPayroll')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DriverPayroll entity.');
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
    * Creates a form to edit a DriverPayroll entity.
    *
    * @param DriverPayroll $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DriverPayroll $entity)
    {
        $form = $this->createForm(new DriverPayrollType(), $entity, array(
            'action' => $this->generateUrl('reports_driverpayroll_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DriverPayroll entity.
     *
     * @Route("/{id}", name="reports_driverpayroll_update")
     * @Method("PUT")
     * @Template("AppBundle:DriverPayroll:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DriverPayroll')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DriverPayroll entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reports_driverpayroll_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DriverPayroll entity.
     *
     * @Route("/{id}", name="reports_driverpayroll_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:DriverPayroll')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DriverPayroll entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reports_driverpayroll'));
    }

    /**
     * Creates a form to delete a DriverPayroll entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reports_driverpayroll_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
