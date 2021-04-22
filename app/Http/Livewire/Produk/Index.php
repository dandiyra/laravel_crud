<?php

namespace App\Http\Livewire\Produk;

use Livewire\Component;
use App\Models\produk;

class Index extends Component
{

    protected $listeners = ['StoreProduk', 'newUpdateProduk'];
    public $updateProduk = false;


    public function getProduk($id)
    {
        $this->updateProduk = true;
        $produk = Produk::find($id);
        $this->emit('updateProduk', $produk);
    }

    public function deleteProduk($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        session()->flash('message', 'Produk Berhasil Di Hapus');

    }

    public function render()
    {
        return view('livewire.produk.index', [
            'produks' => produk::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function StoreProduk($produk)
    {
        session()->flash('message', 'Produk' . $produk['nama_produk'] .' Berhasil Di Tambahkan');
    }

    public function newUpdateProduk($produk)
    {
        session()->flash('message', 'Produk' . $produk['nama_produk'] .' Berhasil Di Update');
        $this->updateProduk = false;
    }
}
