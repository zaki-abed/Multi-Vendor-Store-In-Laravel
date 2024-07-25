<?php

namespace App\Http\Controllers;

use View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    //         // ->except('blabla');
    // }
    public function index() {
        // 1
        $name = "zaki";
        $age = 22;

        $user = Auth::user();
        // dd($user);
        return view('dashboard/index', [
            'name' => 'zaki',
            'age' => '22'
        ]);

        // 2
        // return view('dashboard', compact('name', 'age'));

        // 3
        // return view('dashboard')->with([
        //     'name' => 'Zeko',
        //     'age' => $age
        // ]);

        // 4
        // return View::make('dashboard', [
        //     'name' => 'Zeko',
        //     'age' => $age
        // ]);

        // 5
        // return response()->view('dashboard', [
        //     'name' => 'Zeko',
        //     'age' => $age
        // ]);

        // 5
        // return Response::view('dashboard', [
        //     'name' => 'Zeko',
        //     'age' => $age
        // ]);
    }
}
