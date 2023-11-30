<?php

namespace App\Application\Actions\Movie;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class GetMoviesAction extends MovieAction
{

    protected function action(): Response
    {
        $numberPerPage = (int) $this->resolveArg('numberPerPage');

        try {
            $movies = $this->movieRepository->getMoviesByPage($numberPerPage);

            return $this->respondWithData($movies);
        } catch (Exception $e) {
            return $this->respondWithData(['error' => 'Internal Server Error'], 500);
        }
    }
}