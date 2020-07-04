<?php

namespace spec\Phooty\Support;

use Phooty\Support\Text;
use PhpSpec\ObjectBehavior;

class TextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Text::class);
    }

    function it_can_trim_dot_suffixes()
    {
        $this->beConstructedWith('app.php');
        $this->trimLastDot()->shouldReturn('app');
    }
}
