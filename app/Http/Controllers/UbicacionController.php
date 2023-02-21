<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\provincia;
use App\region;
use App\comuna;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function getApiProvinciaIndex(){
        return response()->json( provincia::get(), 200);
    }

    public function getApiRegionIndex(){
        return response()->json( region::get(), 200);
    }

    public function getApiComunaIndex(){
        return response()->json( comuna::get(), 200);
    }
}
