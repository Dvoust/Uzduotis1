<?php

class Read
{

    protected $format;

    public function __construct(ReadInterface $format)
    {
        $this->format = $format;
    }


    /**
     * Read data from uploaded file
     * Put uploaded file into associative array
     * Print associative array to screen/view
     *
     * @param string $file
     *
     * @return void
     */
    public function readFromFile($f)
    {
        $this->format->readFormat($f);
    }
}