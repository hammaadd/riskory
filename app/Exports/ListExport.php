<?php

namespace App\Exports;

use App\Models\Listrc;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListExport implements FromView, ShouldAutoSize
{
    protected $id;

    function __construct($id){
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.list', [
            'lists' => Listrc::where('list_id','=',$this->id)->get()
        ]);
    }
}
