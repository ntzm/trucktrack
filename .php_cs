<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'bootstrap/cache',
        'node_modules',
        'storage',
        'vendor',
    ])
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder);
