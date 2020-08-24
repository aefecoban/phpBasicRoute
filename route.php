<?php

    class Route{

        private $pages;
        private $where;

        public function __construct()
        {
            $this->pages = array();
            $this->where = __DIR__."/pages";
        }

        public function add($url = "", $page = "")
        {
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
