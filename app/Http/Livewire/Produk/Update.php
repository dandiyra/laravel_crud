<?php

namespace App\Http\Livewire\Produk;

use Livewire\Component;
use App\Models\produk;

class Update extends Component
{
    public $produkId;
    public $nama_produk;
    public $kode_produk;
    public $harga_produk;

    protected $listeners = ['updateProduk'];

    protected $rules = [
        'nama_produk' => 'required|min:6',
        'kode_produk' => 'required',
        'harga_produk' => 'required'
    ];


    public function updateProduk($produk)
    {
        $this->produkId = $produk['id'];
        $this->nama_produk = $produk['nama_produk'];
        $this->kode_produk = $produk['kode_produk'];
        $this->harga_produk = $produk['harga_produk'];
    }

    public function update()
    {
        $this->validate();

        if ($this->produkId) {
            $produk = produk::where('id', $this->produkId)->first();
            $produk->update([
                'nama_produk' => $this->nama_produk,
                'kode_produk' => $this->kode_produk,
                'harga_produk' => $this->harga_produk
            ]);
        }

        $this->emit('newUpdateProduk', $produk);
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
        return view('livewire.produk.update');
    }
}
