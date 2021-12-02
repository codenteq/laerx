<?php

namespace App\Services\Admin;

use App\Models\Package;
use Illuminate\Support\Str;

class PackageService
{
    public function store($request): void
    {
        Package::create([
            'title' => Str::title($request->title),
            'description' => Str::title($request->description),
            'price' => $request->price,
            'planId' => $request->planId,
        ]);
    }

    public function update($id, $request): void
    {
        Package::find($id)->update([
            'title' => Str::title($request->title),
            'description' => Str::title($request->description),
            'price' => $request->price,
            'planId' => $request->planId,
        ]);
    }

    public function destroy($id): void
    {
        Package::find($id)->delete();
    }
}
