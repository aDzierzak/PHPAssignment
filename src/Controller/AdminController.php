<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @Security("has_role('ROLE_ADMIN')") */
    public function index() {
        $template = 'admin/index.html.twig'; $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/crud", name="admin_crud")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function crud()
    {
        return $this->render('admin/crud.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/userIndex", name="admin_userIndex")
     * @Security("has_role('ROLE_ADMIN')")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userIndex()
    {

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('admin/userIndex.html.twig', [
            'controller_name' => 'AdminController',
                'users' => $users,

        ]);
    }



}
