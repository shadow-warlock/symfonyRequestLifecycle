<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

#[AsEventListener(event: 'kernel.request')]
class KernelRequestEventListener
{
    public function __invoke(RequestEvent $requestEvent): void
    {
        $request = $requestEvent->getRequest();
        $clientIp = $request->getClientIp();
        // если запускать index.php из консоли
        if ($clientIp === null) {
            throw new AccessDeniedHttpException('Ты как без IP сюда попал?');
        }
    }
}