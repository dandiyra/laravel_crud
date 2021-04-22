<div>
    <div class="container">
    <!-- Form Create -->
    <div class="card-body pb-5">

        @if ($updateProduk)
            <h1 class="h3 pb-4 mb-4 border-bottom">Update Product</h1>
            @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                     </div>
             @endif
            @livewire('produk.update')
        @else
            <h1 class="h3 pb-4 mb-4 border-bottom">Create Product</h1>
            @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                     </div>
             @endif
            @livewire('produk.create')
        @endif           
    </div>
    


    <!-- Show Data  -->
    <div class="card-body border-top pb-5">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">List Product</a>
            <div class="d-flex">
                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
    </nav>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kode</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($produks as $produk)
            <tr>
            <th scope="row"> {{ $loop->iteration }}     </th>
            <td>    {{ $produk->nama_produk }}    </td>
            <td>    {{ $produk->kode_produk }}    </td>
            <td>Rp.    {{ number_format ($produk->harga_produk) }}    </td>
            <td>
            <button wire:click="getProduk({{$produk->id}})" class="btn btn-warning btn-sm">EDIT</button>
            <button wire:click="deleteProduk({{$produk->id}})" class="btn btn-danger btn-sm">HAPUS</button>

            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    
    </div>
</div>
