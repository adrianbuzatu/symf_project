<?php

namespace Xivic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        $contact = '';
        if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $contact = $this->getDoctrine()
                ->getRepository('XivicUserBundle:Contact')
                ->findBy(array('userid'=>$user->getId()));
        }

        return $this->render('XivicUserBundle::layout.html.twig', array('contacte' => $contact));
    }
}
