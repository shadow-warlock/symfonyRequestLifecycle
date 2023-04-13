<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;

#[AsEventListener(event: 'kernel.view')]
class KernelViewEventListener
{
    public function __invoke(ViewEvent $viewEvent): void
    {
        $controllerResult = $viewEvent->getControllerResult();
        $viewEvent->setResponse(new JsonResponse($controllerResult));
    }
}