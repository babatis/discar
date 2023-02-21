<?php

namespace App\Http\Controllers;

use App\Exports\stockExport;
use App\Exports\rotacionExport;
use App\rotacionv;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class informeController extends Controller
{
    public function exportPrecioProd() {
        return Excel::download(new stockExport, 'stockExport.xls');
    }

    public function exportRotacionProd() {
        return Excel::download(new rotacionExport, 'rotacionExport.xls');
    }

    public function apiGetRotacion(){
        $inf = rotacionv::paginate(10);
        return response()->json($inf, 200);
    }


}
