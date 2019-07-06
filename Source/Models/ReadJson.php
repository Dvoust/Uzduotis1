<?php

class ReadJson implements ReadInterface
{
    public function readFormat($f)
    {
        $str = file_get_contents($f['tmp_name']);
        // decode the JSON into an associative array
        $json = json_decode($str, true);
        echo '<pre>' . print_r($json, true) . '</pre>';
    }
}