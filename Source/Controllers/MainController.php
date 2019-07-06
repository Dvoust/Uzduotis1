<?php

// Loads Main-page
class MainController {
    public function index(){
        //Load views:
        require_once SOURCE . 'Views/Required/header.php';
        require_once SOURCE . 'Views/Main-page/index.php';
        require_once SOURCE . 'Views/Required/footer.php';
    }
     // This method handles what happens when you move to ../home/read

     public function read()
     {
         // Check if a file is uploaded
         if (isset($_POST["upload"])) {
            $filename = $_FILES["fileUpload"]['name'];
            // Get the extension of file (.csv, .json, .xml)
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            switch ($ext) {
                case 'csv':
                    $rdfrmt = new ReadCsv();
                    break;
                case 'json':
                    $rdfrmt = new ReadJson();
                    break;
                case 'xml':
                    $rdfrmt = new ReadXml();
                    break;
                default:
                    echo 'Something went wrong';
                    break;
            }
            // If file extension found then select class according to file extension
            $Read = new Read($rdfrmt);
            // Ouput to screen data from file
            $Read->readFromFile($_FILES["fileUpload"]);
         }
     }
}