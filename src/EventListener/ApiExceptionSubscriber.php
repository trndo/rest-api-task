<?php


namespace App\EventListener;


use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $response = new JsonResponse([
            'message' => 'Internal server error'],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );

        if ($exception instanceof EntityNotFoundException) {
            $response = new JsonResponse([
                'message' => $exception->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }

        $event->setResponse($response);
    }
}