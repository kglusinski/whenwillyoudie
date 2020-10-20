<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zaprogramowani\Application\Query\GetData;
use Zaprogramowani\Application\Service\MortalityDataServiceInterface;

class DataController
{
    private MortalityDataServiceInterface $mortalityDataService;

    public function __construct(MortalityDataServiceInterface $mortalityDataService)
    {
        $this->mortalityDataService  = $mortalityDataService;
    }

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

    public function getData(Request $request): Response
    {
        $query = new GetData(
            $request->get("age"),
            $request->get("place"),
            $request->get("place_type")
        );

        $view = $this->mortalityDataService->process($query);

        return new JsonResponse($view, Response::HTTP_OK);
    }
}
