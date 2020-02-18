<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class programmerController extends Controller
{
    public function show()
    {
        /*
            display the username, get all jobs
        */
        $query = DB::table('users')->where('id', Auth::id())->select('name')
            ->addSelect('web developer')
            ->addSelect('game developer')
            ->first();

        return json_encode($query);
    }

    public function showJobs()
    {
    }
    public function addJob()
    {
    }
    public function removeJob()
    {
    }
}
