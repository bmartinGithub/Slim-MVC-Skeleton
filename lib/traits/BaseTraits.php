<?php
/**
 * Created by IntelliJ IDEA.
 * User: brucemartin
 * Date: 2/9/19
 * Time: 10:37 AM
 */

namespace Lib\Traits;


trait BaseTraits
{

    public function renderTwigView($response,$args,$function){

        $folder = strtolower($this->getControllerBaseName());

        $view =strtolower(str_replace('Action','',$function));
        return $this->container->view->render($response,$folder.'/'.$view.'.twig',$args);
    }
    public function getControllerName(){
        $calledNameSpace = explode("\\",get_called_class());
        $controller = array_pop($calledNameSpace);
        return $controller;
    }
    public function getControllerBaseName(){
        $calledNameSpace = explode("\\",get_called_class());
        $controller = array_pop($calledNameSpace);
        return str_replace('Controller','',$controller);
    }
}