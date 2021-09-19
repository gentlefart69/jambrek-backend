<?php

namespace App\Contracts\Belt;

use App\Models\Belt;

interface BeltRepository
{
    /**
     * Returns a belt by id.
     *
     * @param string $beltId belt id.
     *
     * @return Belt
     */
    public function getById(string $beltId);

    /**
     * Returns all belts.
     * 
     * @return array Belt
     */
    public function getAll();

    /**
     * Add a new belt.
     * 
     * @param array Belt data.
     * @return Belt
     */
    public function add(array $beltData);

    /**
     * Updates an existing belt
     * 
     * @param string $beltId belt id.
     * @param array $beltData new belt data.
     * 
     * @return Belt
     */
    public function update(string $beltId, array $beltData);
}
