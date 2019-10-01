<?php


namespace App\Repositories;


use App\Auto;
use App\Repositories\Abstracts\Repository;

class AutoRepository extends Repository
{

    public function model(): string
    {
        return Auto::class;
    }

    public function findBySlug(string $slug)
    {
        return $this->makeQuery()->where('slug', '=', $slug)
            ->firstOrFail();
    }
}
