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
use App\Lib\BaseController;

class HomeController extends BaseController
{

    public function indexAction(RequestInterface $request, ResponseInterface $response, array $args){
        if($this->csrfSafe($request)){


        $args['model']=$this->container->ReviewModel->getTable()->get();
//        $args['recordCount']=$args['model']->count();
        return $this->renderTwigView($response,$args,__FUNCTION__);
            //$this->container->view->render($response,'home/index.twig',$args);
//        return $this->container->renderer->render($response, 'index.phtml', $args);
        }
    }

    public function landingAction(RequestInterface $request, ResponseInterface $response, array $args){
        $args['model']=$this->container->ReviewModel->getTable()->get();
//        $args['recordCount']=$args['model']->count();
        return $this->container->view->render($response,'home/index2.twig',$args);
//        return $this->container->renderer->render($response, 'index.phtml', $args);
    }

}