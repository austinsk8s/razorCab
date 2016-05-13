<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\DailyOperatingExpenses;
use AppBundle\Form\DailyOperatingExpensesType;

/**
 * DailyOperatingExpenses controller.
 *
 * @Route("/reports/dailyoperatingexpenses")
 */
class DailyOperatingExpensesController extends Controller
{

    /**
     * Lists all DailyOperatingExpenses entities.
     *
     * @Route("/", name="dailyoperatingexpenses")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:DailyOperatingExpenses')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DailyOperatingExpenses entity.
     *
     * @Route("/", name="dailyoperatingexpenses_create")
     * @Method("POST")
     * @Template("AppBundle:DailyOperatingExpenses:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DailyOperatingExpenses();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dailyoperatingexpenses_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DailyOperatingExpenses entity.
     *
     * @param DailyOperatingExpenses $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DailyOperatingExpenses $entity)
    {
        $form = $this->createForm(new DailyOperatingExpensesType(), $entity, array(
            'action' => $this->generateUrl('dailyoperatingexpenses_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DailyOperatingExpenses entity.
     *
     * @Route("/new", name="dailyoperatingexpenses_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DailyOperatingExpenses();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DailyOperatingExpenses entity.
     *
     * @Route("/{id}", name="dailyoperatingexpenses_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DailyOperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DailyOperatingExpenses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DailyOperatingExpenses entity.
     *
     * @Route("/{id}/edit", name="dailyoperatingexpenses_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DailyOperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DailyOperatingExpenses entity.');
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
    * Creates a form to edit a DailyOperatingExpenses entity.
    *
    * @param DailyOperatingExpenses $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DailyOperatingExpenses $entity)
    {
        $form = $this->createForm(new DailyOperatingExpensesType(), $entity, array(
            'action' => $this->generateUrl('dailyoperatingexpenses_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DailyOperatingExpenses entity.
     *
     * @Route("/{id}", name="dailyoperatingexpenses_update")
     * @Method("PUT")
     * @Template("AppBundle:DailyOperatingExpenses:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DailyOperatingExpenses')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DailyOperatingExpenses entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dailyoperatingexpenses_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DailyOperatingExpenses entity.
     *
     * @Route("/{id}", name="dailyoperatingexpenses_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:DailyOperatingExpenses')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DailyOperatingExpenses entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dailyoperatingexpenses'));
    }

    /**
     * Creates a form to delete a DailyOperatingExpenses entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dailyoperatingexpenses_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
