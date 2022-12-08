<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use App\Imports\FirstSheetsImport;

class importRT implements WithMultipleSheets
{
    use importable;
    /**
    * @param Collection $collection
    */
    public function sheets(): array{
        return[
            'Redressement technique' => new FirstSheetsImport(),
        ];
    }


}
