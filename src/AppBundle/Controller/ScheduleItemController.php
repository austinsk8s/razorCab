<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ScheduleItem;
use AppBundle\Form\ScheduleItemType;

/**
 * ScheduleItem controller.
 *
 * @Route("/scheduleitem")
 */
class ScheduleItemController extends Controller
{

    /**
     * Lists all ScheduleItem entities.
     *
     * @Route("/", name="scheduleitem")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ScheduleItem')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ScheduleItem entity.
     *
     * @Route("/", name="scheduleitem_create")
     * @Method("POST")
     * @Template("AppBundle:ScheduleItem:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ScheduleItem();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('scheduleitem_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ScheduleItem entity.
     *
     * @param ScheduleItem $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ScheduleItem $entity)
    {
        $form = $this->createForm(new ScheduleItemType(), $entity, array(
            'action' => $this->generateUrl('scheduleitem_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ScheduleItem entity.
     *
     * @Route("/new", name="scheduleitem_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ScheduleItem();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ScheduleItem entity.
     *
     * @Route("/{id}", name="scheduleitem_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ScheduleItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ScheduleItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ScheduleItem entity.
     *
     * @Route("/{id}/edit", name="scheduleitem_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ScheduleItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ScheduleItem entity.');
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
    * Creates a form to edit a ScheduleItem entity.
    *
    * @param ScheduleItem $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ScheduleItem $entity)
    {
        $form = $this->createForm(new ScheduleItemType(), $entity, array(
            'action' => $this->generateUrl('scheduleitem_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ScheduleItem entity.
     *
     * @Route("/{id}", name="scheduleitem_update")
     * @Method("PUT")
     * @Template("AppBundle:ScheduleItem:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ScheduleItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ScheduleItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('scheduleitem_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ScheduleItem entity.
     *
     * @Route("/{id}", name="scheduleitem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ScheduleItem')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ScheduleItem entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('scheduleitem'));
    }

    /**
     * Creates a form to delete a ScheduleItem entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('scheduleitem_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
