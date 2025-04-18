<?php
// config.php is executed early in the initialization process.
// Helpers are imported immediately to ensure all functions are available in this file.
require_once __DIR__ . '/../plugins/helpers/index.php';

return [
    'debug' => configHelper::setDebugMode(),
    'url'   => configHelper::setEnvURL(":8888", false),
];
