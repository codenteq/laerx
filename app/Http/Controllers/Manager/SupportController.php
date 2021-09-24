<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::where('status',0)->with(['user','info'])->whereRelation('info','companyId',companyId())->latest()->get();
        return view('manager.supports', compact('supports'));
    }

    public function update(Request $request, Support $support)
    {
        try {
            $support->update($request->all());
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
