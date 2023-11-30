<?php

declare(strict_types=1);

use App\Application\Actions\Movie\DeleteMovieAction;
use App\Application\Actions\Movie\GetMoviesAction;
use App\Application\Actions\Movie\GetMoviesSortedAction;
use App\Application\Actions\Movie\ListMoviesAction;
use App\Application\Actions\Movie\UpdateMovieAction;
use App\Application\Actions\Movie\ViewMovieAction;
use App\Application\Actions\User\CreateMovieAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/movies/v1', function (Group $group) {
        $group->get('', ListMoviesAction::class);
        $group->get('/{id}', ViewMovieAction::class);
        $group->get('/{numberPerPage}', GetMoviesAction::class);
        $group->get('/{numberPerPage}/sort/{fieldToSort}', GetMoviesSortedAction::class);
        $group->post('/', CreateMovieAction::class);
        $group->patch('/', UpdateMovieAction::class);
        $group->delete('/{id}', DeleteMovieAction::class);
    });
};
