<?php


namespace App\Services;


use App\Repositories\AutoRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AutoService
{

    const FILE_DIR = 'article';
    /**
     * @var AutoRepository
     */
    private $autoRepository;

    /**
     * AutoService constructor.
     * @param AutoRepository $autoRepository
     */
    public function __construct(AutoRepository $autoRepository)
    {
        $this->autoRepository = $autoRepository;
    }

    public function getPaginateData(): LengthAwarePaginator
    {
        return $this->autoRepository->paginate();
    }

    public function insertNewCar($make, $model)
    {
        $auto = $this->autoRepository->create([
           'make' => $make,
           'model' => $model,
        ]);
    }
}
