<?php

// Loads Error-page
class ErrorController
{
    public function index()
    {
        // Loads Error-page Views
        require SOURCE . 'Views/Required/header.php';
        require SOURCE . 'Views/Error-page/index.php';
        require SOURCE . 'Views/Required/footer.php';
    }
}
