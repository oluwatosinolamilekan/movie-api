<?php

declare(strict_types=1);

namespace App\Application\Actions\Movie;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use App\Application\Actions\Action;
use App\Domain\Movie\MovieRepository;


abstract class MovieAction extends Action
{
    protected MovieRepository $movieRepository;

    public function __construct(LoggerInterface $logger, MovieRepository $movieRepository)
    {
        parent::__construct($logger);
        $this->movieRepository = $movieRepository;
    }

}