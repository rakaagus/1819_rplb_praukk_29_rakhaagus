<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryLog;
use App\ProductLog;
use App\UserLog;

class LogController extends Controller
{
    //
    public function logCategory(){
        $logCategory = CategoryLog::all();
        return view('data-admin.data-log.category', compact('logCategory'));
    }

    public function logProduct(){
        $logProduct = ProductLog::all();
        return view('data-admin.data-log.product', compact('logProduct'));
    }

    public function logUser(){
        $logUser = UserLog::all();
        return view('data-admin.data-log.user', compact('logUser'));
    }
}
