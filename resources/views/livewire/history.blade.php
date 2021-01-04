<div class="container">
    <div class="row mt-4">
        <div class="col">    
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pesan</th>
                            <th>Kode Pemesanan</th>
                            <th>Pesanan</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan }}</td>
                                <td>
                                    <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                    @foreach($pesanan_details as $pesanan_detail)
                                        <img src="{{ url('assets/img/product') }}/{{ $pesanan_detail->product->gambar }}" alt="" class="img-fluid rounded" width="50">
                                        {{ $pesanan_detail->product->nama }}
                                        <br>
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan->status == 1)
                                        Belum Lunas
                                    @else
                                        Lunas
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if(!empty($pesanan))
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan transfer di rekening dibawah ini :</p>
                    <div class="media">
                        <img src="{{ url('assets/img/bri.png') }}" class="mr-3" alt="..." width="50">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BRI</h5>
                            No. Rekening 012345-678-910 atas nama <strong>Rizky Aditiya</strong> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    @endif
</div>
