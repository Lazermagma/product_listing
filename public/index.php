<?php
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods (e.g., GET, POST, OPTIONS, PUT, DELETE)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

// Allow specific headers in requests
header("Access-Control-Allow-Headers: Content-Type, Authorization");
require '../vendor/autoload.php';
$router = require '../src/Routes/index.php';


