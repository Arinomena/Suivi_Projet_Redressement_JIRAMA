<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use App\Imports\FirstSheetsImport;

class importRF implements WithMultipleSheets
{
    use importable;

    /**
    * @param Collection $collection
    */
    public function sheets(): array{
        return[
            'Redressement financier' => new FirstSheetsImport(),
        ];
    }    
}
