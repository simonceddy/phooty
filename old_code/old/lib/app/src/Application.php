<?php
namespace Phooty\App;

use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;
use Phooty\App\Support\Traits\LoopAware;

class Application
{
    use LoopAware;

    /**
     * The Read Stream
     *
     * @var ReadableResourceStream
     */
    protected $stdin;

    /**
     * The Write Stream
     *
     * @var WritableResourceStream
     */
    protected $stdout;

    public function __construct(LoopInterface $loop = null)
    {
        if (!$loop) {
            $loop = Factory::create();
        }
        $this->loop = $loop;

        $this->initReadStream($loop);
        
        $this->initWriteStream($loop);

        $this->stdin->pipe($this->stdout);

        if (defined('SIGINT')) {
            $this->initSignalListeners();   
        }

        $this->initListeners();

        $this->prepareLoop();
    }

    private function prepareLoop()
    {
        $this->loop->addPeriodicTimer(10, function () {
            $memory = memory_get_usage() / 1024;
            $formatted = number_format($memory, 3).'K';
            echo "Current memory usage: {$formatted}\n";
        });
    }

    private function initReadStream(LoopInterface $loop)
    {
        $this->stdin = new ReadableResourceStream(STDIN, $loop);
    }

    private function initWriteStream(LoopInterface $loop)
    {
        $this->stdout = new WritableResourceStream(STDOUT, $loop);
    }

    private function initListeners()
    {
        $this->stdin->on('data', new Listener\DataListener());
    }

    private function initSignalListeners()
    {
        $this->loop->addSignal(
            SIGINT,
            new Listener\SigIntListener($this->loop)
        );
    }

    /**
     * Get the Read Stream
     *
     * @return  ReadableResourceStream
     */ 
    public function stdin()
    {
        return $this->stdin;
    }

    /**
     * Get the Write Stream
     *
     * @return  WritableResourceStream
     */ 
    public function stdout()
    {
        return $this->stdout;
    }

    /**
     * Run the event loop.
     *
     * @return void
     */
    public function run()
    {
        return $this->loop->run();
    }
}
