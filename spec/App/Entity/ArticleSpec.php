<?php

namespace spec\App\Entity;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;

class ArticleSpec extends ObjectBehavior
{
    function it_implements_resource_interface()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    function its_title_is_mutable()
    {
        $this->setTitle('Awesome title');
        $this->getTitle()->shouldReturn('Awesome title');
    }
}
