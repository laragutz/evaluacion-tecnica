<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Producto::select(
            'id',
            'nombre',
            'sku',
            'categoria',
            'precio',
            'stock',
            'activo',
            'fecha_registro'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'SKU',
            'Categoría',
            'Precio',
            'Stock',
            'Activo',
            'Fecha Registro'
        ];
    }
}
