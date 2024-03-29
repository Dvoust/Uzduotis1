<?php

// Starts the Application
class Application
{
    // Initiating values
    private $url_controller = null;

    private $url_action = null;

    private $url_params = array();

    // Class Application main functions
    public function __construct()
    {
        // Create array with URL parts in $url
        $this->splitUrl();

        // Check for controller - if no controller is given, then load start-page
        if (!$this->url_controller) {

            $page = new MainController();
            $page->index();

        } elseif (file_exists(SOURCE . 'Controllers/' . ucfirst($this->url_controller) . 'Controller.php')) {
            // here we did check for controller: does such a controller exist ?

            // if so, then load this file and create this controller
            // like \App\Controller\AppController
            $controller = ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->url_controller, $this->url_action) &&
                is_callable(array($this->url_controller, $this->url_action))) {
                
                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    // No action defined: call the default index() method of a selected controller.
                    $this->url_controller->index();
                } else {
                    $page = new ErrorController();
                    $page->index();
                }
            }
        } else {
            // If controller does not exist load error controller
            $page = new ErrorController();
            $page->index();
        }
    }

    //Splits URL into sections

    private function splitUrl()
    {
        if (!isset($_GET['url'])) {
            return;
        }
        // Split URL
        $url = trim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        // Put URL parts into according properties
        // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
        if (isset($url[0])) {
            $this->url_controller = $url[0];
        }
        if (isset($url[1])) {
            $this->url_action =$url[1];
        }

        // Remove controller and action from the split URL
        unset($url[0], $url[1]);

        // Rebase array keys and store the URL params
        $this->url_params = array_values($url);

    }
}
