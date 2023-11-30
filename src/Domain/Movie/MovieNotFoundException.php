<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\DomainException\DomainRecordNotFoundException;

class MovieNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Movie you requested does not exist.';
}
