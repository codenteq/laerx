<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\LanguageRequest;
use App\Models\Language;
use Illuminate\Support\Str;

class LanguageService
{
    public function store(LanguageRequest $request): void
    {
        Language::create([
            'title' => Str::title($request->title),
            'code' => Str::lower($request->code),
        ]);
    }

    public function update(LanguageRequest $request, $id): void
    {
        Language::find($id)->update([
            'title' => Str::title($request->title),
            'code' => Str::lower($request->code),
        ]);
    }

    public function destroy($id): void
    {
        Language::find($id)->delete();
    }
}
