<?php


namespace App\Services;

use App\Auto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\AutoRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class AutoService
 * @package App\Services
 */
class AutoService
{

    /**
     *
     */
    const FILE_DIR = 'auto';
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

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginateData(): LengthAwarePaginator
    {
        return $this->autoRepository->paginate();
    }

    /**
     * @param $make
     * @param $model
     * @param $photo
     */
    public function insertNewCar($make, $model, $photo)
    {
        $auto = $this->autoRepository->create([
            'make' => $make,
            'model' => $model,
        ]);

        if ($photo !== null) {
            $uploadedPhoto = $this->uploadPhoto($photo, $auto->id);
            $auto->photo = $uploadedPhoto;
            $auto->save();
        }
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getById($id)
    {
        return $this->autoRepository->find($id);
    }

    /**
     * @param $id
     * @param $make
     * @param $model
     * @param $photo
     * @return int
     */
    public function updateById($id, $make, $model, $photo = null)
    {
        $auto = $this->autoRepository->makeQuery()->findOrFail($id);
        $uploadedPhoto = $auto->photo;

        if ($photo !== null) {
            $uploadedPhoto = $this->uploadPhoto($photo, $auto->id);
        }

        $updated = $this->autoRepository->update([
            'make' => $make,
            'model' => $model,
            'photo' => $uploadedPhoto
        ], $id);

        return $updated;
    }

    /**
     * @param int $id
     */
    public function destroyById(int $id)
    {
        $this->autoRepository->delete($id);
    }

    /**
     * @param $photo
     * @param $autoId
     * @return null
     */
    private function uploadPhoto($photo, $autoId)
    {
        if ($photo === null) {
            return null;
        }

        return $photo->store(self::FILE_DIR . '/' . $autoId, 'public');
    }
}
