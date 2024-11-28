<?php

namespace App\Infrastructure\Event\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class ApiEventSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => [
                ['transformResponseToJson', 0],
            ],
            KernelEvents::EXCEPTION => [
                ['transformExceptionToJson', 10],
                ['logException', 0],
                ['notifyException', -10],
            ],
        ];
    }

    public function transformResponseToJson(ResponseEvent $event): void
    {
        $event->getResponse()->headers->set('Content-Type', 'application/json');
    }

    public function transformExceptionToJson(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        if ($exception instanceof HttpExceptionInterface) {
            $status = $exception->getStatusCode();
        }

        $response = new JsonResponse(
            data: [
                'error' => $event->getThrowable()->getMessage(),
                'details' => [/* todo */]
            ],
            status: $status
        );

        $event->setResponse($response);
    }

    public function logException(ExceptionEvent $event): void
    {
        // todo: implement monolog logger
    }

    public function notifyException(ExceptionEvent $event): void
    {
        // todo: send to ... based on the most critical condition ...
    }
}
