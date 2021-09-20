<?php

namespace App\Excel\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
        return view('exports.users', [
            'users' => User::where('type', User::Normal)->get()
        ]);
    }
}
