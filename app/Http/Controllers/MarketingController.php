<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Support\Facades\Validator;
use PDF;

class MarketingController extends Controller
{
    //
    public function index()
    {

    }

    public function program()
    {
        dd('marketing');
    }
}
