<?php

declare(strict_types=1);

namespace App\Domain\Movie;

use App\Domain\Movie\Movie;
use App\Domain\User\MovieNotFoundException;

interface MovieRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Movie
     * @throws MovieNotFoundException
     */
    public function findMovieOfId(int $id): Movie;

    /**
     * @param Movie $movie
     * @return void
     */
    public function createMovie(Movie $movie): void;

    /**
     * @param int $id
     * @param Movie $movie
     * @return void
     * @throws MovieNotFoundException
     */
    public function updateMovie(int $id, Movie $movie): void;

    /**
     * @param int $id
     * @return void
     * @throws MovieNotFoundException
     */
    public function deleteMovie(int $id): void;

    /**
     * @param int $page
     * @param string $fieldToSort
     * @return Movie[]
     */
    public function getMoviesSortedByField(int $page, string $fieldToSort): array;

    /**
     * @param int $id
     * @param array $data
     * @return void
     * @throws MovieNotFoundException
     */
    public function partialUpdateMovie(int $id, array $data): void;
}
