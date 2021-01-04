<div class="container">
    @if(\Illuminate\Support\Facades\Auth::user())
        <div class="row mt-4">
            <div class="col">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th colspan="2">Total Harga</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ url('assets/img/product') }}/{{ $pesanan_detail->product->gambar }}" alt="" class="rounded" width="100">
                                    </td>
                                    <td>{{ $pesanan_detail->product->nama }}</td>
                                    <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                                    <td>Rp. {{ number_format($pesanan_detail->total_harga) }}</td>
                                    <td>
                                        <i wire:click="destroy({{ $pesanan_detail->id }})" class="fas fa-times text-danger"></i>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" align="center">Data Kosong</td>
                                </tr>
                            @endforelse
                    
                            @if(!empty($pesanan))
                                <tr>
                                    <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                </tr>
                                <tr class="table-borderless">
                                    <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                                    <td><strong>Rp. {{ $pesanan->kode_unik }}</strong></td>
                                </tr>
                                <tr class="table-borderless">
                                    <td colspan="6" align="right"><strong>Total yang harus di bayarkan  :</strong></td>
                                    <td><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2">
                                        <a href="{{ route('checkout') }}" class="btn btn-success btn-block">Check Out</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <?php return redirect()->route('login') ?>
    @endif
</div>

