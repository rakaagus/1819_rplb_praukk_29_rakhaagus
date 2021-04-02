<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activitylog;


class LogController extends Controller
{
    //
    public function index(){
        $logs = Activitylog::all();
        return view('data-admin.data-log.index', compact('logs'));
    }
}
