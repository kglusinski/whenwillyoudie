<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zaprogramowani\Application\Command\RegisterUser;
use Zaprogramowani\Application\Service\UserService;

class UserController
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register(Request $request): Response
    {
        $requestBody = $request->getContent();
        $requestArray = json_decode($requestBody, true);

        $username = $requestArray["username"];
        $password = $requestArray["password"];

        $command = new RegisterUser($username, $password);

        $this->service->register($command);

        return new JsonResponse(["ok" => true], Response::HTTP_CREATED);
    }
}
