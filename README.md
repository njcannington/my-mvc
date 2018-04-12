# Custom MVC

In order to gain a better understanding of how the MVC framework operates. I wanted to build one from scratch.


## Setup - tested with
1. <strong>PHP 5.6 </strong>
2. <strong>Apache 2.4.\*</strong>
    * needed modules:
        * mod_rewrite
    * set AllowOverride to All
    * point the DocumentRoot to the /web directory within project
3. <strong>MySQL 5.7.20</strong>


## Usage
The controller and view paths are related to the URL's path. Here's a breakdown of where the controller and view files need to be placed, given the URL path.

```
1 backslash
exampe url path     = www.domain.com/examplepath
controller dir path = app/controllers/indexcontroller.php
class               = indexController
action              = thisAction
view path           = app/views/examplepath.html

2 backslashes
url path            = www.domain.com/exampleone/exampletwo
controller dir path = app/controllers/exampleone/indexcontroller.php
class               = indexController
action              = exampletwoAction
view path           = app/views/exampleone/exampletwo.html

3 backslashes
url path            = www.domain.com/exampleone/exampletwo/examplethree
controller dir path = app/controllers/exampleone/exampletwocontroller.php
class               = exampletwoController
action              = examplethreeAction
view path           = app/views/exampleone/exampletwo/examplethree.html
```
