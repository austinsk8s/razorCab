<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ActivityIncome;
use AppBundle\Form\ActivityIncomeType;

/**
 * ActivityIncome controller.
 *
 * @Route("/reports/activityincome")
 */
class ActivityIncomeController extends Controller
{

    /**
     * Lists all ActivityIncome entities.
     *
     * @Route("/", name="reports_activityincome")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ActivityIncome')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ActivityIncome entity.
     *
     * @Route("/", name="reports_activityincome_create")
     * @Method("POST")
     * @Template("AppBundle:ActivityIncome:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ActivityIncome();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reports_activityincome_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ActivityIncome entity.
     *
     * @param ActivityIncome $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ActivityIncome $entity)
    {
        $form = $this->createForm(new ActivityIncomeType(), $entity, array(
            'action' => $this->generateUrl('reports_activityincome_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ActivityIncome entity.
     *
     * @Route("/new", name="reports_activityincome_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ActivityIncome();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ActivityIncome entity.
     *
     * @Route("/{id}", name="reports_activityincome_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ActivityIncome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityIncome entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ActivityIncome entity.
     *
     * @Route("/{id}/edit", name="reports_activityincome_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ActivityIncome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityIncome entity.');
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
    * Creates a form to edit a ActivityIncome entity.
    *
    * @param ActivityIncome $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ActivityIncome $entity)
    {
        $form = $this->createForm(new ActivityIncomeType(), $entity, array(
            'action' => $this->generateUrl('reports_activityincome_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ActivityIncome entity.
     *
     * @Route("/{id}", name="reports_activityincome_update")
     * @Method("PUT")
     * @Template("AppBundle:ActivityIncome:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ActivityIncome')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityIncome entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reports_activityincome_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ActivityIncome entity.
     *
     * @Route("/{id}", name="reports_activityincome_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ActivityIncome')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActivityIncome entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reports_activityincome'));
    }

    /**
     * Creates a form to delete a ActivityIncome entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reports_activityincome_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
