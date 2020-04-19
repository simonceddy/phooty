<?php
use Doctrine\ORM\EntityManagerInterface;

require 'autoload.php';

$app = include_once 'bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    $app->make(EntityManagerInterface::class)
);
