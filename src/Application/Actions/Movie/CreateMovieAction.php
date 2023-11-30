<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Movie\MovieAction;
use Psr\Http\Message\ResponseInterface as Response;

class CreateMovieAction extends MovieAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();

        $users = $this->movieRepository->createMovie($data);

        return $this->respondWithData($users);
    }
}
