<?php
namespace Phooty\App\Listener;

use React\EventLoop\LoopInterface;
use Phooty\App\Support\Traits\LoopAware;

class SigIntListener
{
    use LoopAware;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function __invoke($signal)
    {
        echo 'Signal: ', (string)$signal, PHP_EOL;
        $this->loop->removeSignal(SIGINT, $this);
    }
}
