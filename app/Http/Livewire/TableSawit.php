<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableSawit extends Component
{
    use WithPagination;
    public $dataField = 'tahun', $dataOrder = 'asc';
    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }

    public function getSawit(){
        return DB::table('tbsawit')->select('tahun', 'tbm', 'tm', 'tr', 'totalluas', 'produksi', 'produktifitas', 'petani', 'produk', 'pengusahaan')->where('komoditas', 'Sawit')->orderBy($this->dataField, $this->dataOrder)->paginate(10);
    }

    public function render()
    {
        $sawit = $this->getSawit();
        return view('livewire.table-sawit', compact('sawit'));
    }
}
