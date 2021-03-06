<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Services\BeltService;


class BeltController extends Controller
{
    //
    /**
     * @var BeltService $beltService
     */
    protected $beltService;

    public function __construct(
        BeltService $beltService
    ) {
        $this->beltService = $beltService;
    }

    /**
     * Gets all belts
     *
     * @return Json response
     */
    public function getAll()
    {
        return $this->beltService->getAll();
    }

    /**
     * Gets a belt
     *
     * @param Request $request
     *
     * @return Response Json respnose
     */
    public function getBelt(Request $request)
    {
        $beltId = $request->route('belt');
        $belt = $this->beltService->getBelt($beltId);

        return response()->json($belt);
    }

    /**
     * Adds a new belt
     *
     * @param Request $request
     *
     * @return Response Json respnose
     */
    public function addBelt(Request $request)
    {
        $beltImage = $request->file('image');

        $beltData = [
            'name' => $request->name,
            'color' => $request->color,
            'category' => $request->category,
            'type' => $request->type,
            'price' => $request->price,
        ];

        $belt = $this->beltService->addBelt($beltData, $beltImage);

        return response()->json($belt);
    }

    /**
     * Updates a belt
     *
     * @param Request $request
     *
     * @return Response Json respnose
     */
    public function updateBelt(Request $request)
    {
        $id = $request->route('belt');
        $beltData = $request->all();

        return $this->beltService->update($id, $beltData);
    }

    /**
     * Deletes a belt
     *
     * @param Request $request
     *
     * @return Response Json respnose
     */
    public function deleteBelt(Request $request)
    {
        $beltId = $request->route('belt');

        return $this->beltService->deleteBelt($beltId);
    }
}
