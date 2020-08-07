<?php

namespace spec\Phooty\Core;

use Phooty\Core\Configuration;
use PhpSpec\ObjectBehavior;

class ConfigurationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'test' => true,
            'value' => 'something',
            'number' => 1299
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Configuration::class);
    }

    function it_makes_items_read_only_after_construction()
    {
        $this->offsetSet('new', 'thing');
        $this->toArray()->shouldNotHaveKey('new');
        $this->offsetExists('new')->shouldEqual(false);

        $this->offsetUnset('number');
        $this->toArray()->shouldHaveKey('number');
        $this->offsetExists('number')->shouldEqual(true);
    }
}
