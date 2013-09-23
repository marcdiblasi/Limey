#!/usr/bin/php
<?php

require_once 'lib/Limey/Compiler.php';

if (0 === count($_SERVER['argv'])) {
    usage();
}

if (!file_exists($_SERVER['argv'][1]) || !is_readable($_SERVER['argv'][1])) {
    echo "inputFile does not exist or is not readable." . PHP_EOL;
    usage();
}

$compiler = new Limey_Compiler();
$compiler->loadFile($_SERVER['argv'][1]);

$output = $compiler->run();

var_dump($_SERVER['argv']);

if (count($_SERVER['argv']) > 1) {
    file_put_contents($_SERVER['argv'][2], $output);
} else {
    echo $output;
}

function usage() {
    echo "Usage: Limey.php inputFile [outputFile]" . PHP_EOL;
    echo "If no outputFile is specified, script outputs to STDOUT." . PHP_EOL;
    exit;
}
