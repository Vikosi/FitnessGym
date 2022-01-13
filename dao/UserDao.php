<?php
    require_once ("../dataBaseMapper/UserMapper.php");
    require_once ("../bean/User.php");
    require_once ("BaseDao.php");

    class UserDao extends dao {
        
        function GetUserById($id)
        {
            $id =  pg_escape_string($id);

            $query="SELECT id, userrole, login FROM users WHERE id='$id'";
            $result = pg_query($this->con, $query);
            $sm=new UserMapper();
            $list=array();
            if($result) 
            {
                $rows = pg_num_rows($result); // количество полученных строк
    
                for ($i = 0; $i < $rows; ++$i) 
                {
                    $row = pg_fetch_row($result);
                    $s=$sm->mapRow($row);
                    array_push($list,$s);
    
                }
    
            }
            return $list;
        }
        
    }
    