<?php
require_once ("dataBaseMapper/ScheduleMapper.php");
require_once ("bean/Schedule.php");
require_once ("conf.php");
class ScheduleDao
{
    protected $con;
    public function __construct()
    {
        /*$host = "localhost";
        $user = "postgres";
        $pass = "dbrfnbif23";
        $db = "SportClub";*/
        $this->con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

    }
    public function __destruct()
    {

        pg_close($this->con);
    }
    public function getScheduleList()
    {
        $query="SELECT fio, date_time_start, nazvanie_train FROM train train inner join trainer trainer ON trainer.idtrainer=train.idtrainer ORDER BY date_time_start DESC";
        $result = pg_query($this->con, $query);
        $sm=new ScheduleMapper();
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