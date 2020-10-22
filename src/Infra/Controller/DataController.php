<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zaprogramowani\Application\Exception\AgeOutOfRangeException;
use Zaprogramowani\Application\Exception\UnknownPlaceTypeException;
use Zaprogramowani\Application\Exception\UnknownSexException;
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
        try {
            $query = new GetData(
                $request->query->getInt("age"),
                $request->query->getInt("place_type"),
                $request->query->getInt("sex")
            );
        } catch (AgeOutOfRangeException $e) {
            return new JsonResponse([
                "error" => "age parameter should be between 0 and 100"
            ], Response::HTTP_BAD_REQUEST);
        } catch (UnknownPlaceTypeException $e) {
            return new JsonResponse([
                "error" => "unknown place type, either city or rural"
            ], Response::HTTP_BAD_REQUEST);
        } catch (UnknownSexException $e) {
            return new JsonResponse([
                "error" => "unknown sex type, either male or female"
            ], Response::HTTP_BAD_REQUEST);
        };

        $view = $this->mortalityDataService->process($query);

        return new JsonResponse($view, Response::HTTP_OK);
    }
}
