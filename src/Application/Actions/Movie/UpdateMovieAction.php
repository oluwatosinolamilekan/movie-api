<?php

namespace App\Application\Actions\Movie;

use App\Domain\User\MovieNotFoundException;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateMovieAction extends MovieAction
{
    protected function action(): Response
    {
        $movieId = (int) $this->resolveArg('id');

        $data = $this->getFormData();

        try {
            $existingMovie = $this->movieRepository->findMovieOfId($movieId);

            // Update only the fields that are present in the request data
            foreach ($data as $key => $value) {
                if (property_exists($existingMovie, $key)) {
                    $existingMovie->{$key} = $value;
                }
            }

            $this->movieRepository->updateMovie($movieId, $existingMovie);

            return $this->respondWithData(['message' => 'Movie updated successfully']);
        } catch (Exception $e) {
            return $this->respondWithData(['error' => $e->getMessage()], 500);
        }

    }
}