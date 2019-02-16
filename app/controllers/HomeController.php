<?php
/**
 * Created by IntelliJ IDEA.
 * User: brucemartin
 * Date: 2/9/19
 * Time: 11:03 AM
 */

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Lib\BaseController;

class HomeController extends BaseController
{

    public function indexAction(RequestInterface $request, ResponseInterface $response, array $args){
        if($this->csrfSafe($request)){
            return $this->renderTwigView($response,$args,__FUNCTION__);
        }
    }

    public function landingAction(RequestInterface $request, ResponseInterface $response, array $args){
        return $this->container->view->render($response,'home/index2.twig',$args);
    }

}