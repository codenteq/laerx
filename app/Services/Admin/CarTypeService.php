<?php

namespace App\Services\Admin;

use App\Models\CarType;
use Illuminate\Support\Str;

class CarTypeService
{
    public function store($request)
    {
        CarType::create([
            'title' => Str::title($request->title)
        ]);
    }

    public function update($id, $request)
    {
        CarType::find($id)->update([
            'title' => Str::title($request->title)
        ]);
    }

    public function destroy($id)
    {
        CarType::find($id)->delete($id);
    }
}
