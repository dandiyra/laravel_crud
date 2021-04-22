<?php

namespace App\Http\Livewire\Produk;

use Livewire\Component;
use App\Models\produk;

class Create extends Component
{
    public $nama_produk;
    public $kode_produk;
    public $harga_produk;

    protected $rules = [
        'nama_produk' => 'required|min:6',
        'kode_produk' => 'required',
        'harga_produk' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        $produk = produk::create([
            'nama_produk' => $this->nama_produk,
            'kode_produk' => $this->kode_produk,
            'harga_produk' => $this->harga_produk
        ]);
        
        $this->emit('StoreProduk', $produk);

        $this->deleteInput();

        
        
    }

    public function deleteInput()
    {
        $this->nama_produk = null;
        $this->kode_produk = null;
        $this->harga_produk = null;

    }


    public function render()
    {
        return view('livewire.produk.create');
    }
}
