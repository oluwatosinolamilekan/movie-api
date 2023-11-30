<?php
namespace App\Application\Actions\Movie;

use App\Application\Actions\Movie\MovieAction;
use App\Domain\User\MovieNotFoundException;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteMovieAction extends MovieAction
{
    protected function action(): Response
    {
        $movieId = (int) $this->resolveArg('id');

        try {
            $this->movieRepository->deleteMovie($movieId);
            $message = ['message' => 'Movie deleted successfully'];
            return $this->respondWithData($message);
        } catch (MovieNotFoundException $e) {
            return $this->respondWithData(['error' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return $this->respondWithData(['error' => $e->getMessage()], 500);
        }
    }
}