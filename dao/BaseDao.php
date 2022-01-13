<?php

require_once ("../conf.php");

    class Dao {
        
        protected $con;
        public function __construct()
        {
            $this->con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");
    
        }
    }
    