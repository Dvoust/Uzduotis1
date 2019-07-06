<?php 

// This auto-loads all Composer-dependencies from 'SOURCE' folder
spl_autoload_register(function($className) {
    // Directories added to array
    $dirs = [
        SOURCE . 'Core',
        SOURCE . 'Models',
        SOURCE . 'Views',
        SOURCE . 'Controllers'
    ];
    
    // Searches classes in every directory
    foreach ($dirs as $dir) {
        // If file (classs) existst in the directory
        if (file_exists($dir . '/' . $className . '.php')) {
            // Class file exists, include and return
            include_once ($dir . '/' . $className . '.php');
            return;
        }
    } 
});
