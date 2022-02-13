<?php

namespace App\Repository;

use App\Services\LastfmService;

class GenerateRepository
{
    public function render(string $username) : array
    {
        $requestApi = new LastfmService();
        return $requestApi->getArtists($username);
    }
}
