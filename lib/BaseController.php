<?php
/**
 * Created by IntelliJ IDEA.
 * User: brucemartin
 * Date: 2/9/19
 * Time: 10:39 AM
 */

namespace Lib;
use Slim\Http\Request;
use Psr\Container\ContainerInterface;
use Slim\Http\Response;

abstract class BaseController
{
    use \Lib\Traits\BaseTraits;
    /******** Properties ********/
    /**
     * @var App
     */
//    private $app;
    /**
     * @var container
     */
    protected $container;

    /****** Base functions ******/
    public function __construct(ContainerInterface $c)
    {
        //$this->app = $app;
        $this->container = $c;

    }
    public function csrfSafe(Request $request)
    {
        $result = false;
        if ($request->getAttribute('csrf_status') === false) {
            // display suitable error here
            $this->container['csrfErrorHandler']($this->container);
        } else {
            $result = true;
        }
        return $result;
    }

}