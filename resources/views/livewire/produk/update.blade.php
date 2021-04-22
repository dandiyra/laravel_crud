<div>
            <form class="row g-3 mt-3" wire:submit.prevent="update">
            <input type="hidden" wire:model="produkId">
                <div class="col-12">
                        <label for="inputAddress" class="form-label">Nama Produk</label>
                        <input type="text" wire:model="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="inputAddress" placeholder="Contoh: Outfit Cowok" required>
                        @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Kode Produk</label>
                        <input type="text" wire:model="kode_produk" class="form-control" id="inputEmail4" placeholder="Contoh:KTP124">
                        @error('kode_produk') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Harga Produk</label>
                        <input type="number" wire:model="harga_produk" class="form-control" id="inputPassword4" min="1" required>
                        @error('harga_produk') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 pt-4">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
            </form>
</div>
