<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\PeriodRequest;
use App\Models\Period;

class PeriodService
{
    public function store(PeriodRequest $request): void
    {
        Period::create($request->all());
    }

    public function update(PeriodRequest $request, $id): void
    {
        Period::find($id)->update($request->all());
    }

    public function destroy($id): void
    {
        Period::find($id)->delete();
    }
}
