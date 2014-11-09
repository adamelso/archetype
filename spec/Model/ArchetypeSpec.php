<?php

namespace spec\Sylius\Component\Archetype\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArchetypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Component\Archetype\Model\Archetype');
    }

    function it_is_an_Archetype()
    {
        $this->shouldImplement('Sylius\Component\Archetype\Model\ArchetypeInterface');
    }
}
