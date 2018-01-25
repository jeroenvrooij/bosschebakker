<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{

    /**
     * @Route("login")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login()
    {
        return new Response('Hello world');
    }
}