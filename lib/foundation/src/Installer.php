<?php
namespace Phooty\Foundation;

class Installer
{
    /**
     * The Application instance
     *
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    
}
