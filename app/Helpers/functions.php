<?php

function data_br($value)
{
    $format = 'd/m/Y';
    return date($format, strtotime($value));
}
