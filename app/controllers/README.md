This directory is intended to store your controllers fort he app. A git repo may be made as a submodule in the App directory.

Controllers must follow this following guide lines:

##Name:
The controller must follow this naming convention. The name of the controller followed by Controller.php

The base controller will parse the name removing the Controller.php and lower casing the rest to determine the Views directory name.
####Examples:
HomeController.php

View will be found in app/views/home.

ReviewsController.php

View will be found in app/views/reviews

####Namespace
The controller namespace follows the directory structure:

App\Controllers
####Uses
All controllers must use the following:

Psr\Http\Message\RequestInterface;
Psr\Http\Message\ResponseInterface;
Lib\BaseController;

Lib\BaseController is extended and contains a default construct method. If you would like to override the construct method call 
`parent::__construct($container);`
 
to ensure your controller is properly initialized.

####Methods
To keep with a naming convention All methods that correspond to a route should follow this naming convention:

`<methodName>Action(){...}`
For example an index route would have a corisponding method in the controller as:
  
    public function indexAction(RequestInterface $request, ResponseInterface $response, array $args){
      return $this->renderTwigView($response,$args,__FUNCTION__); 
    }
 
 >Note: rednerTwigView is a trait method found in `Lib\Traits\BaseTraits` We pass in the name of the function because it get's parsed to determin the correct view based on controller name and method name.
 In this example the view can be found in: 
 `app/views/home/index.twig`

####Sample Controller

~~~~
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
~~~~

>To see a sample controller copy the above code and create a new file named HomeController.php and past the code intot he file.
open the routes