<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Movie;

use App\Domain\Movie\Movie;
use App\Domain\Movie\MovieRepository;
use App\Domain\User\MovieNotFoundException;

class InMemoryMovieRepository implements MovieRepository
{
    /**
     * @var Movie[]
     */
    private array $movies;

    /**
     * @param Movie[]|null $movies
     */
    public function __construct(array $movies = null)
    {
        $this->movies = $movies ?? [
            1 => new Movie(
                1,
                '1',
                'Die Hard',
                1988,
                '20 Jul 1988',
                '132 min',
                'Action, Thriller',
                'John McTiernan',
                'Bruce Willis, Alan Rickman, Bonnie Bedelia',
                'United States',
                'https://m.media-amazon.com/images/M/MV5BZjRlNDUxZjAtOGQ4OC00OTNlLTgxNmQtYTBmMDgwZmNmNjkxXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg',
                8.2,
                'movie'
            ),
            // Add more movies as needed
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->movies);
    }

    /**
     * {@inheritdoc}
     */
    public function findMovieOfId(int $id): Movie
    {
        if (!isset($this->movies[$id])) {
            throw new MovieNotFoundException();
        }

        return $this->movies[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function createMovie(Movie $movie): void
    {
        $id = max(array_keys($this->movies)) + 1;
        $movie->setId($id);
        $this->movies[$id] = $movie;
    }

    /**
     * {@inheritdoc}
     */
    public function updateMovie(int $id, Movie $movie): void
    {
        if (!isset($this->movies[$id])) {
            throw new MovieNotFoundException();
        }

        $this->movies[$id] = $movie;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteMovie(int $id): void
    {
        if (!isset($this->movies[$id])) {
            throw new MovieNotFoundException();
        }

        unset($this->movies[$id]);
    }

    /**
     * {@inheritdoc}
     */
    public function partialUpdateMovie(int $id, array $data): void
    {
        if (!isset($this->movies[$id])) {
            throw new MovieNotFoundException();
        }

        foreach ($data as $key => $value) {
            if (property_exists($this->movies[$id], $key)) {
                $this->movies[$id]->{$key} = $value;
            }
        }
    }
}