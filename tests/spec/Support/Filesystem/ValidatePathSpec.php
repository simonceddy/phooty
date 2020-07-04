<?php

namespace spec\Phooty\Support\Filesystem;

use Phooty\Support\Filesystem\ValidatePath;
use PhpSpec\ObjectBehavior;

class ValidatePathSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ValidatePath::class);
    }

    function it_validates_the_given_string_and_returns_splfileinfo()
    {
        $this->validFileInfo(__DIR__)->shouldBeAnInstanceOf(\SplFileInfo::class);
    }

    function it_validates_splfileinfo_object_and_returns_it(\SplFileInfo $path)
    {
        $path->isReadable()->willReturn(true);
        $this->validFileInfo($path)->shouldEqual($path);
    }

    function it_throws_an_exception_if_an_invalid_type_is_given()
    {
        $this->shouldThrow(\InvalidArgumentException::class)
            ->duringValidFileInfo(123);
    }

    function it_throws_an_exception_if_the_given_string_is_not_a_valid_path()
    {
        $this->shouldThrow(\InvalidArgumentException::class)
            ->duringValidFileInfo('lll');
    }

    function it_throws_an_exception_if_the_given_path_is_not_readable(\SplFileInfo $path)
    {
        $path->isReadable()->willReturn(false);
        $path->__toString()->willReturn('bnt');
        $this->shouldThrow(\InvalidArgumentException::class)
            ->duringValidFileInfo($path);
    }
}
