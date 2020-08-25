<?php

    class Route{

        private $pages;
        private $where;
        private $globals;

        public function __construct()
        {
            $this->pages = array();
            $this->where = __DIR__."/pages";
        }

        public function add($url = "", $page = "")
        {

            if($url == 1){
                $this->globals = $page;
                return true;
            }

            if(!empty($page)){
                if(!isset($this->pages[$url])){
                    $this->pages[$url] = $page;
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function remove($url = "")
        {
            if(isset($this->pages[$url])){
                unset($this->pages[$url]);
                return true;
            }else{
                return false;
            }
        }

        public function show($url = "", $specialVariable = "")
        {

            $vars = $specialVariable;

            if(isset($this->globals)){
                if(isset($this->globals["_GET"])){
                    $GET = $this->globals["_GET"];
                }else{
                    $GET = array();
                }
                if(isset($this->globals["_POST"])){
                    $POST = $this->globals["_POST"];
                }else{
                    $POST = array();
                }
                if(isset($this->globals["_COOKIE"])){
                    $COOKIE = $this->globals["_COOKIE"];
                }else{
                    $COOKIE = array();
                }
                if(isset($this->globals["_FILES"])){
                    $FILES = $this->globals["_FILES"];
                }else{
                    $FILES = array();
                }
                if(isset($this->globals["_SERVER"])){
                    $SERVER = $this->globals["_SERVER"];
                }else{
                    $SERVER = array();
                }
                
            }

            foreach ($this->pages as $Purl => $Ppage) {
                if($Purl == $url){
                    if(file_exists($this->where."/".$Ppage)){
                        require_once($this->where."/".$Ppage);
                    }
                    break;
                }
            }

        }

        public function whichPage($page = "")
        {
            $this->where = __DIR__."/".$page;
        }

        public function getAllPages()
        {
            print_r($this->pages);
        }

    }

?>
