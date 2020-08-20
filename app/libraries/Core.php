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
            $this->currentController = new $this->currentController; // override the currentController to the "Pages"
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