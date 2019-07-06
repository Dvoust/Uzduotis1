<?php

// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
// Set a constants that hold the project's "application" folders.
define('SOURCE', ROOT . 'source' . DIRECTORY_SEPARATOR);

// Load pre-defined values.
require_once SOURCE . 'Config/Config.php';

// This is the auto-loader for Composer-dependencies.
require_once 'Autoloader.php';

// Application start
$app = new Application();

