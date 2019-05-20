<?php
namespace Phooty\Core\Event;

interface Listener
{
    public function listensFor(): array;

    public function notify(string $event);
}
