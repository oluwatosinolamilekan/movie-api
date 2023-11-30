<?php

declare(strict_types=1);

namespace App\Domain\Movie;

use JsonSerializable;

class Movie implements JsonSerializable
{
    private ?int $id;
    private string $uid;
    private string $title;
    private int $year;
    private string $released;
    private string $runtime;
    private string $genre;
    private string $director;
    private string $actors;
    private string $country;
    private string $poster;
    private float $imdb;
    private string $type;

    public function __construct(
        ?int $id,
        string $uid,
        string $title,
        int $year,
        string $released,
        string $runtime,
        string $genre,
        string $director,
        string $actors,
        string $country,
        string $poster,
        float $imdb,
        string $type
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->title = $title;
        $this->year = $year;
        $this->released = $released;
        $this->runtime = $runtime;
        $this->genre = $genre;
        $this->director = $director;
        $this->actors = $actors;
        $this->country = $country;
        $this->poster = $poster;
        $this->imdb = $imdb;
        $this->type = $type;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getReleased(): string
    {
        return $this->released;
    }

    public function getRuntime(): string
    {
        return $this->runtime;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getActors(): string
    {
        return $this->actors;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPoster(): string
    {
        return $this->poster;
    }

    public function getImdb(): float
    {
        return $this->imdb;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}