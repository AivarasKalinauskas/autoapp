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
}
