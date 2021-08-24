<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\PeriodRequest;
use App\Models\Period;

class PeriodService
{

    /**
     * @param PeriodRequest $request
     */
    public function store(PeriodRequest $request) : void
    {
        Period::create($request->all());
    }

    /**
     * @param PeriodRequest $request
     * @param $id
     */
    public function update(PeriodRequest $request, $id) : void
    {
        Period::find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function destroy($id) : void
    {
        Period::find($id)->delete();
    }
}
