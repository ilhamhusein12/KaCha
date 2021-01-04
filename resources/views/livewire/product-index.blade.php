<div class="container">
    <div class="row">
        <div class="col">    
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <input wire:model="search" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ url('assets/img/product') }}/{{ $product->gambar }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->nama }}</h4>
                        <p>Rp. {{ number_format($product->harga) }}</p>
                        <a href="{{ route('products.detail', $product->id) }}" class="btn btn-primary btn-block">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="row">
        <div class="col">
            {{ $products->links() }}
        </div>
    </div>
</div>
