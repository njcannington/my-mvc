# Custom MVC

In order to gain a better understanding of how the MVC framework operates. I wanted to build one from scratch.


## Usage

### Routing
Within the web/index.php file, all routing is handled with ```$route->add()```. You just need to specify the uri, controller, and action.

eg: ``` $route->add("/", "index", "index")```

This ensures the home page is routed to the IndexController and returns the indexAction method.

### Controllers
All controllers should stored in the App\\Controllers namespace (and directory), using the syntax {Uppercasename}Controller (eg. ```IndexController```). However the file itself should be all lowercase (eg. ```indexcontroller.php```)

The action within the controller uses the syntax {lowercasename}Action (eg. ```indexAction```)

### Views
Set the view within an action using ```setView()``` method. (eg. ```$this->setView("/login"))```). All view files are lowercase and stored in the app\\views directory.


## Setup
### Tested with:
1. <strong>PHP 5.6 - PHP 7.2 </strong>
2. <strong>Apache 2.4.\*</strong>
    * needed modules:
        * mod_rewrite
    * set AllowOverride to All
    * point the DocumentRoot to the /web directory within project
3. <strong>MySQL 5.7.20</strong>
