<?php

namespace spec\Chencha\Pspell;

use Chencha\Pspell\Config;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PspellSpec extends ObjectBehavior
{
    function let(){
        $config=new Config();
        $this->beConstructedWith($config);


    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Pspell\Pspell');
    }
}
