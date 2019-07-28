<?php
namespace Phooty\Commentary\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ActionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [];
    }
}
