<?php

namespace FormationBundle\Controller;

use FormationBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Formation controller.
 *
 */
class FormationController extends Controller
{
    /**
     * Lists all formation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('FormationBundle:Formation')->findAll();
        return $this->render('formation/index.html.twig', array(
            'formations' => $formations,
        ));
    }

    /**
     * Creates a new formation entity.
     *
     */
    public function newAction(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm('FormationBundle\Form\FormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('formation_show', array('ref' => $formation->getRef()));
        }

        return $this->render('formation/new.html.twig', array(
            'formation' => $formation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a formation entity.
     *
     */
    public function showAction(Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);

        return $this->render('formation/show.html.twig', array(
            'formation' => $formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formation entity.
     *
     */
    public function editAction(Request $request, Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);
        $editForm = $this->createForm('FormationBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formation_edit', array('ref' => $formation->getRef()));
        }

        return $this->render('formation/edit.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formation entity.
     *
     */
    public function deleteAction(Request $request, Formation $formation)
    {
        $form = $this->createDeleteForm($formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formation);
            $em->flush();
        }

        return $this->redirectToRoute('formation_index');
    }

    /**
     * Creates a form to delete a formation entity.
     *
     * @param Formation $formation The formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Formation $formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formation_delete', array('ref' => $formation->getRef())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
