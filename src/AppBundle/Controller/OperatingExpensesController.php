<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\OperatingExpenses;
use AppBundle\Form\OperatingExpensesType;

/**
 * OperatingExpenses controller.
 *
 * @Route("/reports/operatingexpenses")
 */
class OperatingExpensesController extends Controller
{

    /**
     * Lists all OperatingExpenses entities.
     *
     * @Route("/", name="operatingexpenses")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:OperatingExpenses')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new OperatingExpenses entity.
     *
     * @Route("/", name="operatingexpenses_create")
     * @Method("POST")
     * @Template("AppBundle:OperatingExpenses:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new OperatingExpenses();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('operatingexpenses_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a OperatingExpenses entity.
     *
     * @param OperatingExpenses $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OperatingExpenses $entity)
    {
        $form = $this->createForm(new OperatingExpensesType(), $entity, array(
            'action' => $this->generateUrl('operatingexpenses_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OperatingExpenses entity.
     *
     * @Route("/new", name="operatingexpenses_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new OperatingExpenses();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a OperatingExpenses entity.
     *
     * @Route("/{id}", name="operatingexpenses_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:OperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OperatingExpenses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing OperatingExpenses entity.
     *
     * @Route("/{id}/edit", name="operatingexpenses_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:OperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OperatingExpenses entity.');
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
    * Creates a form to edit a OperatingExpenses entity.
    *
    * @param OperatingExpenses $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OperatingExpenses $entity)
    {
        $form = $this->createForm(new OperatingExpensesType(), $entity, array(
            'action' => $this->generateUrl('operatingexpenses_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing OperatingExpenses entity.
     *
     * @Route("/{id}", name="operatingexpenses_update")
     * @Method("PUT")
     * @Template("AppBundle:OperatingExpenses:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:OperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OperatingExpenses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('operatingexpenses_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a OperatingExpenses entity.
     *
     * @Route("/{id}", name="operatingexpenses_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:OperatingExpenses')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OperatingExpenses entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('operatingexpenses'));
    }

    /**
     * Creates a form to delete a OperatingExpenses entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operatingexpenses_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
