<?php


function formatDate($date , $format ){
    if($date == '' || $date == null)
        return;

    return date($format,strtotime($date));
}
