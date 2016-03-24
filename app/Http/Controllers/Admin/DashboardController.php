<?php

namespace emutoday\Http\Controllers\Admin;


use emutoday\Story;
use emutoday\User;

class DashboardController extends Controller
{

    public function index(Story $storys, User $users)
    {
        $storys = $storys->orderBy('updated_at', 'desc')->take(5)->get();
        $users = $users->whereNotNull('last_login_at')->orderBy('last_login_at', 'desc')->take(5)->get();
        //flash()->info("butttttttttt");
        return view('admin.dashboard', compact('storys', 'users'));

    }
}
