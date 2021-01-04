<div class="container">
    <div class="row mt-4">
        <div class="col">    
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan transfer di rekening dibawah ini sebesar : <strong>Rp. {{ number_format($total_harga) }}</strong></p>
            <div class="media">
                <img src="{{ url('assets/img/bri.png') }}" class="mr-3" alt="..." width="50">
                <div class="media-body">
                    <h5 class="mt-0">BANK BRI</h5>
                    No. Rekening 012345-678-910 atas nama <strong>Rizky Aditiya</strong> 
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label for="nama">Nomor HP</label>
                    <input wire:model="nohp" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea wire:model="alamat" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success float-right">Checkout</button>
            </form>
        </div>
    </div>
</div>
