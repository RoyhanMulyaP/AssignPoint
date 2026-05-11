<?php

// Pastikan error ditampilkan jika terjadi masalah saat build/runtime
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Definisikan path ke public/index.php
require __DIR__ . '/../public/index.php';
