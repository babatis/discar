<?php

namespace App\Exports;

use App\rotacionv;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class rotacionExport implements FromCollection, WithHeadings
{
    
    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre',
            'Precio',
            'Costo'
        ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return rotacionv::select(
                                'Codigo',
                                'Nombre',
                                'Enero',
                                'Febrero',
                                'Marzo',
                                'Abril',
                                'Mayo',
                                'Junio',
                                'Julio',
                                'Agosto',
                                'Septiembre',
                                'Octubre',
                                'Noviembre',
                                'Diciembre',
                                'Precio',
                                'Costo')
                        ->get();
    }
}
