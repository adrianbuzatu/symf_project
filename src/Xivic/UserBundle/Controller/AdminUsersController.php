<?php namespace Xivic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Xivic\UserBundle\Entity\User;
use Xivic\UserBundle\Form\Type\UserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;

class AdminUsersController extends Controller
{
	public function indexAction(Request $request)
    {
		$role_filter = (int)$request->query->get('role');
		
		$user = $this->get('security.context')->getToken()->getUser();
		$user_manager = $this->get('fos_user.user_manager');
		if($role_filter == 0){
			$users = $user_manager->findUsers();
			/*foreach($users as $item){
				echo "<p>".$item->getRoles().'</p>';
			}*/
		} else {
			$roles_array = array(
				'1' => 'ROLE_USER',
				'2' => 'ROLE_ADMIN',
				'3' => 'ROLE_SUPERADMIN'
			);
			$target = $roles_array[$role_filter];
			$users = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM XivicUserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter('role', '%'.$target.'%')->getResult();
		}
        
		/*$users = $this->getDoctrine()->getEntityManager()
            ->createQuery(
                'SELECT u FROM XivicUserBundle:User u WHERE u.roles LIKE :role'
            )->setParameter('role', '%"ROLE_USER"%')->getResult();*/
		/*echo "<pre>";
		var_dump($users);
		echo "</pre>";
		die;*/
        return $this->render('XivicUserBundle:AdminUsers:show.html.twig', array('users' => $users));
    }
	
	public function createAction(Request $request){
		$user = $this->get('security.context')->getToken()->getUser();
		$user_manager = $this->get('fos_user.user_manager');
		$users = $user_manager->findUsers();
		//$new_user = $user_manager->createUser();
		//echo "<pre>";
		//var_dump($new_user);
		//die;
		$form = $this->createForm(new UserFormType());
		if ($request->isMethod('POST')) {
			
            $form->bind($request);
			
            if ($form->isValid()) {
                $userForm = $form->getData();
				$userForm_parsed = array();
				$roles = array();
				
				$factory = $this->get('security.encoder_factory');
				
				$encoder = $factory->getEncoder($user);
				$blank_user = new User();
				$blank_user->setConfirmationToken(hash( 'sha256', $userForm['email'].$this->container->parameters['secret'] ));
				$blank_user->setUsername($userForm['username']);
				$blank_user->setEmail($userForm['email']);
				$blank_user->setEnabled(1);
				//$blank_user->roles = array();
				$blank_user->setPassword($encoder->encodePassword($userForm['password'], $blank_user->getSalt()));
				if($userForm['role_user'] == true){
					$blank_user->addRole('ROLE_USER');
				}
				if($userForm['role_admin'] == true){
					$blank_user->addRole('ROLE_ADMIN');					
				}
				if($userForm['role_super_admin'] == true){
					$blank_user->addRole('ROLE_SUPER_ADMIN');					
				}
				if($userForm['role_user'] == false && $userForm['role_admin'] == false && $userForm['role_super_admin'] == false){
					$blank_user->addRole('ROLE_USER');	
				}
				//var_dump($blank_user);die;
				$this->persistEntity($blank_user)->flush();
                //$userForm->setUserid($user->getId());
                /*$em = $this->getDoctrine()->getManager();
				 *
                $em->persist($contactForm);
                $em->flush();*/

                return $this->redirect($this->generateUrl('xivic_adminusers'));
            }
        }

        return $this->render('XivicUserBundle:AdminUsers:create.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	function persistEntity($entity)
    {
       $em = $this->getDoctrine()->getManager();
       $em->persist($entity);
       
       return $em;
    }
	
	public function editAction(Request $request){
		
	}
	
	public function deleteAction(){
		
	}
}