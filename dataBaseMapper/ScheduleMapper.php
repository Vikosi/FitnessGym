<?php

class ScheduleMapper
{
    public function mapRow($res){
        $s=new Schedule();
        $s->dateTimeStart=$res[1];
        $s->fio=$res[0];
        $s->nazvanieTrain=$res[2];
        return $s;
    }
}