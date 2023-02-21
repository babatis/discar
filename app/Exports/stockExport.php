<?php

namespace App\Exports;

use App\prodVenta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class stockExport implements FromCollection, WithHeadings
{
    
    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Stock',
            'Distribución',
            'Mayorista',
            'Meson'
        ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return prodVenta::select('codinterno', 
                                 'nombre',
                                 'cantidad',
                                 'p3_neto',
                                 'p2_neto',
                                 'p1_neto')->get();
    }
}
