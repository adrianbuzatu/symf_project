<?php

namespace Xivic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xivic\UserBundle\Entity\Contact;
use Xivic\UserBundle\Form\Type\ContactFormType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $contact = $this->getDoctrine()
            ->getRepository('XivicUserBundle:Contact')
            ->findBy(array('userid'=>$user->getId()));

//        if (!$contact) {
//            throw $this->createNotFoundException(
//                'Nu aveti contacte '
//            );
//        }
        return $this->render('XivicUserBundle:Admin:show.html.twig', array('contacte' => $contact));
    }

    public function createAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $contact = new Contact();
     //   $task->setTask('Write a blog post');
     //   $task->setDueDate(new \DateTime('tomorrow'));

    //    $form = $this->createFormBuilder($task)
     //       ->add('task', 'text')
    //        ->add('dueDate', 'date')
    //        ->getForm();


        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ContactFormType(), $contact);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $contactForm = $form->getData();
                $contactForm->setUserid($user->getId());
                $em = $this->getDoctrine()->getManager();
                $em->persist($contactForm);
                $em->flush();

                return $this->redirect($this->generateUrl('xivic_admin'));
            }
        }

        return $this->render('XivicUserBundle:Admin:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('XivicUserBundle:Contact')->find($id);

        $em->remove($product);
        $em->flush();
        
        return $this->redirect($this->generateUrl('xivic_admin'));

    }
}
