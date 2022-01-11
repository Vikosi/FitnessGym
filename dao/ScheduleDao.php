<?php
require_once ("dataBaseMapper/ScheduleMapper.php");
require_once ("bean/Schedule.php");
require_once ("BaseDao.php");
class ScheduleDao extends dao 
{
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