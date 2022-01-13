<?php
Class view{

    function render ($content, $data=NULL){
        include "../view/".$content;
    }
}