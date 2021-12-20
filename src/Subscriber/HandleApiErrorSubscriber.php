<?php
declare(strict_types=1);

namespace App\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Psr\Log\LoggerInterface;

final class HandleApiErrorSubscriber implements EventSubscriberInterface
{

    public function __construct(
        private string $env,
        private LoggerInterface $logger
    ) {
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['processException', 10],
            ]
        ];
    }

    public function processException(ExceptionEvent $event)
    {

        //ten subscriber powinien obsługiwać wyłącznie błędy z API
        // dla środowiska PROD zwracamy wiadomość "Ops, something went wrong"
        // dla środowiska DEV zwracamy pełne informacje o błędzie
        // LoggerInterface

        $request = $event->getRequest();

        if (!str_contains($request->getPathInfo(), 'api')) {
            return false;
        }

        $exception = $event->getThrowable();

        if ($this->env == 'dev') {
            $error = $exception->getMessage();
        } else {
            $error = 'Ops, something went wrong';
        }

        $response = new JsonResponse(['error' => $error], status: 500);

        $this->logger->error($exception->getMessage(), [
            'file'  => $exception->getFile(),
            'code'  => $exception->getCode(),
            'trace' => $exception->getTrace()
        ]);

        $event->setResponse($response);

        return true;
    }

}