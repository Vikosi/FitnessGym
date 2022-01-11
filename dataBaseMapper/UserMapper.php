<?php

class UserMapper
{
    public function mapRow($res){
        $s=new User();
        $s->id=$res[0];
        $s->role=$res[1];
        $s->login=$res[2];
        return $s;
    }
}