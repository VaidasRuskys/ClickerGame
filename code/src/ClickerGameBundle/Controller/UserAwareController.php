<?php
/**
 * Created by PhpStorm.
 * User: vaidas
 * Date: 18.7.24
 * Time: 20.27
 */
namespace ClickerGameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserAwareController extends Controller
{
    protected function getAuthorizedUser()
    {
        $user = $this->getUser();

        //todo exception if user not logged in

        return $user;
    }
}