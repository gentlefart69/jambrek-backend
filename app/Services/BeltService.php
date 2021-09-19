<?php

namespace App\Services;

use App\Repositories\BeltRepository;
use App\Exceptions\BeltNotFoundException;
use App\Models\Belt;
use DateTime;

class BeltService
{
    /**
     * @var BeltRepository $beltRepository
     */
    protected $beltRepository;

    public function __construct(
        BeltRepository $beltRepository
    ) {
        $this->beltRepository = $beltRepository;
    }
    /**
     * Returns all belts.
     * 
     * @throws BeltNotFoundException if belt is not found.
     * 
     * @return Belt
     */
    public function getAll()
    {
        return $this->beltRepository->getAll();
    }

    /**
     * Returns belt by unique id.
     * 
     * @param string $beltId Belt id.
     * 
     * @throws BeltNotFoundException if belt is not found.
     * 
     * @return Belt
     */
    public function getBelt(string $beltId)
    {
        $belt = $this->beltRepository->getById($beltId);

        if (!$belt) {
            throw new BeltNotFoundException();
        }

        return $belt;
    }

    /**
     * Creates new belt.
     * 
     * @param $beltData
     * 
     * @return Belt
     */
    public function addBelt($beltData) {
        $belt = $this->beltRepository->add($beltData);
        return $belt;
    }

    /**
     * Updates existing belt
     * 
     * @param string $beltId Belt id.
     * @param array $beltData new belt data.
     * 
     * @throws BeltNotFoundException if belt is not found.
     * 
     * @return Belt
     */
    public function update(string $beltId, array $beltData)
    {
        $belt = $this->beltRepository->update($beltId, $beltData);

        if (!$belt) {
            throw new BeltNotFoundException();
        }

        return $belt;
    }


    /**
     * Delete belt
     * 
     * @param string $beltId Belt id
     */
    public function deleteBelt(string $beltId) {
        $belt = $this->beltRepository->delete($beltId);
    }
}
