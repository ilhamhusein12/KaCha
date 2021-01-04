<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Pesanan;
use App\PesananDetail;
use Livewire\Component;

class ProductDetail extends Component
{

    public $product, $jumlah_pesanan;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        //validasi sebelum masukan keranjang harus login terlebih dahulu
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        //menghitung total harga
        $total_harga = $this->jumlah_pesanan*$this->product->harga;

        //check apakah user mempunyai data pesanan utama yang statusnya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //menyimpan data pesanan utama
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999)
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'KC-'.$pesanan->id;
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        //menyimpan data pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $total_harga
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
