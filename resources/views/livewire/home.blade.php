  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h2 class="my-4">Categori</h2>
        @foreach($categories as $category)
        <a href="{{ route('products.category', $category->id) }}">
          <div class="card mt-3 text-center shadow-sm">
              <div class="card-body">
                  <img src="{{ url('assets/img/category') }}/{{ $category->gambar }}" alt="" width="100">
              </div>
          </div>
        </a>
        @endforeach

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4 shadow-sm" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{ url('assets/img/slide/slide.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{ url('assets/img/slide/slide1.jpg') }}" alt="Second slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="{{ route('products') }}" class="btn btn-primary float-right">Lihat Semua</a>
            </div>
        </div>

        <div class="row">
        @foreach($products as $product)
          <div class="col-lg-4 col-md-6 mb-4">
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
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->