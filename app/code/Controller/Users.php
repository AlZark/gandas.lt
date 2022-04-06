<?php

namespace Controller;

use Core\ControllerAbstract;
use Helper\Url;
use Model\User as UserModel;
use Model\Users as modelUser;

class Users extends ControllerAbstract
{
    public function register(): void
    {
        $this->twig->display('users/register.html.twig');

    }

    public function login(): void
    {
        $this->twig->display('users/login.html.twig');

    }

    public function create()
    {
        $user = new modelUser();
        $user->setName((string)$_POST['firstName']);
        $user->setLastName((string)$_POST['lastName']);
        $user->setEmail((string)$_POST['email']);
        $user->setPassword(md5((string)$_POST['password']));
        $user->setRoleId(0);
        $user->setNickName((string)$_POST['nickname']);
        $user->setActive(1);
        $user->setCreatedAt((string)Date("Y-m-d H:i:s"));
        $user->save();
        $this->twig->display('users/login.html.twig');
    }

    public function check(): void
    {
        //develop login
    }

}