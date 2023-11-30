<?php

namespace App\Application\Actions\Movie;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class GetMoviesSortedAction extends MovieAction
{

    protected function action(): Response
    {
        $numberPerPage = (int) $this->resolveArg('numberPerPage');
        $fieldToSort = $this->resolveArg('fieldToSort');

        try {
            $movies = $this->movieRepository->getMoviesSortedByField($numberPerPage, $fieldToSort);

            return $this->respondWithData($movies);
        } catch (Exception $e) {
            return $this->respondWithData(['error' => 'Internal Server Error'], 500);
        }
    }
}