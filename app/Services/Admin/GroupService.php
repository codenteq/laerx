<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\GroupRequest;
use App\Models\Group;
use Illuminate\Support\Str;

class GroupService
{

    /**
     * @param GroupRequest $request
     */
    public function store(GroupRequest $request) : void
    {
        Group::create([
            'title' => Str::upper($request->title),
        ]);
    }

    /**
     * @param GroupRequest $request
     * @param $id
     */
    public function update(GroupRequest $request, $id) : void
    {
        Group::find($id)->update([
            'title' => Str::upper($request->title),
        ]);
    }

    /**
     * @param $id
     */
    public function destroy($id) : void
    {
        Group::find($id)->delete();
    }
}
