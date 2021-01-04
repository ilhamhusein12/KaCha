<div class="container">
    <div class="row mt-4">
        <div class="col">    
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid rounded" src="{{ url('assets/img/product') }}/{{ $product->gambar }}" alt="">
        </div>
        <div class="col-md-6">
            <h2><strong>{{ $product->nama }}</strong></h2>
            @if($product->status == 1)
                <span class="badge rounded-pill badge-success mb-3"><i class="fas fa-check"></i> Ready</span>
            @else
                <span class="badge rounded-pill badge-danger mb-3"><i class="fas fa-times"></i> Habis</span>
            @endif
            <h4>Rp. {{ number_format($product->harga) }}</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukanKeranjang">                 
                        <table class="table" style="border-top: hidden">
                            <tr>
                                <td>category</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ url('assets/img/category') }}/{{ $product->category->gambar }}" alt="" class="img-fluid" width="100">
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input type="number" wire:model="jumlah_pesanan" class="form-control" required="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-primary float-right" @if($product->status !== 1) disabled @endif>Masukan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
