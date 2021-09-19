<?php

namespace App\Repositories;

use App\Models\Belt;
use App\Exceptions\BeltNotFoundException;
use App\Contracts\Belt\BeltRepository as Repository;

class BeltRepository implements Repository
{
    /**
     * Get all belts.
     * 
     * @return array Belt
     */
    public function getAll() {
        return Belt::all();
    }

    /**
     * Get belt by id.
     * 
     * @param $beltId belt id
     * 
     * @return Belt
     */
    public function getById($beltId) {
        return Belt::where('id', $beltId)->first();

    }

    /**
     * Adds a new belt
     * 
     * @param string $beltData belt data
     * 
     * @return Belt
     */
    public function add(array $beltData)
    {
        $belt = new Belt;
        $belt->name = $beltData['name'];
        $belt->category = $beltData['category'];
        $belt->color = $beltData['color'];
        $belt->type = $beltData['type'];
        $belt->price = $beltData['price'];
        $belt->save();

        return $belt;
    }

    /**
     * Updates a belt.
     * 
     * @param string $beltId id.
     * @param array $beltData Belt data.
     * 
     * @returns Belt
     */
    public function update(string $beltId, array $beltData) {
        $belt = Belt::where('id', $beltId)->first();

        if (!$belt) {
            throw new BeltNotFoundException();
        }

        $belt->name = $beltData['name'];
        $belt->category = $beltData['category'];
        $belt->color = $beltData['color'];
        $belt->type = $beltData['type'];
        $belt->price = $beltData['price'];

        $belt->save();
    }

    /**
     * Deletes a belt
     * 
     * @param string $beltId belt id
     */
    public function delete($beltId)
    {
        $belt = Belt::where('id', $beltId)->first();
        if (!$belt) {
            throw new BeltNotFoundException();
        }

        $belt->delete();
    }
}
