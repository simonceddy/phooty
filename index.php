<?php
require 'vendor/autoload.php';
require 'autoload.php';
$app = include_once 'bootstrap.php';

$kernel = $app->make(Phooty\Console\Kernel::class);

//$kernel->run();

$loop = React\EventLoop\Factory::create();

$loop->addPeriodicTimer(10, function () {
    $memory = memory_get_usage() / 1024;
    $formatted = number_format($memory, 3).'K';
    echo "Current memory usage: {$formatted}\n";
});

$stdout = new React\Stream\WritableResourceStream(STDOUT, $loop);
$stdin = new React\Stream\ReadableResourceStream(STDIN, $loop);
$stdin->pipe($stdout);


$stdin->on('data', function ($data) {
    $data = new Symfony\Component\Console\Input\StringInput($data);
    
    switch ((string) $data) {
        case 'sim':
            $sim = new Phooty\Simulation\Kernel();
            dd($sim);
            break;
        default:
            echo 'data' . PHP_EOL;
    }
});

echo (new Symfony\Component\Console\Formatter\OutputFormatter())->format(
    Phooty\Console\Artwork\TitleLarry3D::render()
);


$loop->run();
