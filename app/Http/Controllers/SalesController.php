<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class SalesController extends Controller
{
    //
    public function index()
    {
        // return view('sales.index');
    }

    public function customer()
    {
        dd('sales');
    }
}
