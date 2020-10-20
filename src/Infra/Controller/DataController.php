<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DataController
{
    public function index(Request $request): Response
    {
        return new JsonResponse(
            [
                'status' => "ok",
                'date' => new \DateTime()
            ],
            Response::HTTP_OK
        );
    }
}
