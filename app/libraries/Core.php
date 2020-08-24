<?php
    //Core app Class
    class Core {
        protected $currentController = 'Pages'; // if there are no other controller in the controller file, the file pages will be automatically loaded
        protected $currentMethod = 'index'; //inside the page controller will load the index method
        protected $params = []; //get the URL parameters

        public function __construct() {
            $url = $this->getUrl();

            //ucwords upper case the first characterof each word in a string
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {  //check if the URL index[0] exist in the crontroller folder
                $this->currentController = ucwords($url[0]); //Will override the currentController 
                unset($url[0]);
            }
            //Instatiate the new controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController; 

            //Check for the second part of the URL
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            // Get parameters
            $this->params = $url ? array_values($url) : []; //checking is there are any params and if it's not keep it empty

            // call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }


        public function getUrl() {
            if(isset($_GET['url'])) {
               $url = rtrim($_GET['url'], '/');

               $url = filter_var($url, FILTER_SANITIZE_URL); //not allowing characters that URL should not have

               $url = explode('/', $url); //break the URL into an array
               return $url;
            }
        }
    }