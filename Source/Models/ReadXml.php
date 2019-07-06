<?php

class ReadXml implements ReadInterface
{
    public function readFormat($f)
    {
        $xmldata = simplexml_load_file($f['tmp_name']) or die("Failed to load");
        print_r($xmldata);
    }
}
