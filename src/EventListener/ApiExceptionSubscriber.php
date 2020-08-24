<?php


namespace App\EventListener;


use App\Exception\CustomValidatorException;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Validator\Exception\ValidatorException;

/**
 * Class ApiExceptionSubscriber
 * @package App\EventListener
 */
class ApiExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }

    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $response = new JsonResponse([
            'message' => 'Bad request'],
            Response::HTTP_BAD_REQUEST
        );

        if (
            $exception instanceof EntityNotFoundException
            || $exception instanceof NotFoundHttpException
        ) {
            $response = new JsonResponse([
                'message' => $exception->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof CustomValidatorException) {
            $response = new JsonResponse([
                'errors' => $exception->getValidatorMessages()
            ], Response::HTTP_BAD_REQUEST);
        }

        $event->setResponse($response);
    }
}