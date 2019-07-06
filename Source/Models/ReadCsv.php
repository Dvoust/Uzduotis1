<?php

class ReadCsv implements ReadInterface
{
    public function readFormat($f)
    {
        $display = $fields = array(); $i = 0;
        if (($handle = fopen($f['tmp_name'], "r")) !== false) {
            while (($data = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $data;
                    continue;
                }
                foreach ($data as $k=>$value) {
                    $display[$i][$fields[$k]] = $value;
                }
                $i++;
            }
            fclose($handle);
        }
        print_r($display);
    }
}