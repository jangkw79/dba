<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('today'))
{
    function today()
    {
        $date = new DateTime('now');
        return $date->format("Y-m-d");
    }
}