# Slim Framework 3 Skeleton Application MVC

This skeleton application was forked from slimphp/Slim-Skeleton most of the original readme still applies. I just reworded portions to make it clear we are talking about the MVC skeleton.

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 MVC application. This application uses the latest Slim 3 with the PHP-View template renderer and twig-view template, take your pick. It also uses the Monolog logger.

This skeleton mvc application was built for Composer. This makes setting up a new Slim Framework MVC application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project bmartinGithub/slim-mvc-skeleton [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.
* Ensure 'cache/' is web writeable.

To run the application in development, you can run these commands 

	cd [my-app-name]
	php composer.phar start

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something cool.

## Well Almost!

## MVC info

Changes to the original project start now!
I moved the source code from src to app/controllers | models | lib | extra all have their own namespace.
I moved the template directory to view/<controllershortname>|layouts|components
I added a cache directory to be outside the app directory.

##Routes
You can follow the normal instructions for routes as documented for slimframework. I perfered using the NAMESPACE::class':function' method directly in the controller instead of adding to the dependency container.

## App\Controllers
Every controller should extend App\Lib\BaseController This will allow you to inherit the construct method but still allow you to override it when needed.

public function __construct(Container $container){
    this.container = $container;
}

By extending the BaseController class you also get to use the App\Lib\ControllerTraits\BaseTraits
This will be the centeral location for common methods that should be shared with all controllers.


more to come...