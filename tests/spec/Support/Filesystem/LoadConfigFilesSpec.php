<?php

namespace spec\Phooty\Support\Filesystem;

use Phooty\Support\Filesystem\LoadConfigFiles;
use PhpSpec\ObjectBehavior;

class LoadConfigFilesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(LoadConfigFiles::class);
    }

    function it_includes_php_files_from_the_given_directory()
    {
        $dir = dirname(__DIR__, 4) . '/config';
        $this->from($dir)->shouldHaveKey('app');
    }
}
