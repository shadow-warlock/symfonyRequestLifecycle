<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;

#[AsEventListener(event: 'kernel.terminate')]
class KernelTerminateEventListener
{
    public function __invoke(TerminateEvent $terminateEvent): void
    {
        $terminateCallback = $terminateEvent->getRequest()->attributes->get('terminate');
        if ($terminateCallback) {
            $terminateCallback();
        }
    }
}