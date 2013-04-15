<?php namespace Xivic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xivic\UserBundle\Entity\User;
use Xivic\UserBundle\Form\Type\UserFormType;
use Symfony\Component\HttpFoundation\Request;

class AdminUsersController extends Controller
{
	public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
		$user_manager = $this->get('fos_user.user_manager');
        $users = $user_manager->findUsers();
		/*echo "<pre>";
		var_dump($users);
		echo "</pre>";
		die;*/
        return $this->render('XivicUserBundle:AdminUsers:show.html.twig', array('users' => $users));
    }
	
	public function createAction(){
		$user = $this->get('security.context')->getToken()->getUser();
		$user_manager = $this->get('fos_user.user_manager');
		$users = $user_manager->findUsers();
		//$new_user = $user_manager->createUser();
		//echo "<pre>";
		//var_dump($new_user);
		//die;
		$form = $this->createForm(new UserFormType());
		if ($request->isMethod('POST')) {
			echo "<pre>";
			var_dump($request);
			die;
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

        return $this->render('XivicUserBundle:AdminUsers:create.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	public function editAction(){
		
	}
	
	public function deleteAction(){
		
	}
}