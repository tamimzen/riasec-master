<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    
    protected $dataUser;
    protected $tahun;
    protected $prodi;
    
    function __construct($dataUser, $prodi,$tahun) {
         
            $this->dataUser = $dataUser;
            $this->tahun = $tahun;
            $this->prodi = $prodi;
    }

    public function view(): View
    {
        return view('admin.user.excel', [
            'dataUser' => $this->dataUser,
            'tahun' => $this->tahun,
            'prodi' => $this->prodi,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
            },
        ];
    }


    public function collection()
    {
        return User::all();
    }
}
