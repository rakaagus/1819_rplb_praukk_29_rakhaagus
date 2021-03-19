{{-- livewire --}}
<div>
    {{-- container --}}
    <div class="container">

        {{-- benner. --}}
        <div class="benners">
            <img src="{{ asset('assets/img/slider/slider1.png') }}" alt="" width="100%">
        </div>
        {{-- end Benners. --}}

            {{-- pilih liga --}}
            <section class="pilih-liga mt-4">
                <h3><strong>Pilih Category</strong></h3>
                <div class="row mt-4">
                    @foreach ($categories as $ctg)
                    <div class="col">
                        <div class="card shadow">
                            <a href="{{ route('products.category', $ctg->id) }}" style="text-decoration: none;color:black;">
                                <div class="card-body text-center">
                                    <h3>{{ $ctg->nama }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            {{-- pilih liga --}}

            {{-- best Product --}}
            <section class="product mt-4 mb-5">
                <h3>
                    <strong>Best Product</strong>
                    <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat semua</a>
                </h3>
                <div class="row mt-4">
                    @foreach ($products as $product)
                    <div class="col md-3">
                        <div class="card">
                            <div class="card-body text-center">
                            <img src="{{ url('assets/img/product/'.$product->gambar) }}" alt="" class="img-fluid gambar-product">

                            {{-- keterangan product --}}
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h5><strong>{{ $product->nama }}</strong></h5>
                                        <h5>Rp. {{number_format($product->harga)}}</h5>
                                    </div>
                                </div>
                            {{-- end keterangan product --}}

                             {{-- detail --}}
                             <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i>Detail</a>
                                </div>
                            </div>
                        {{-- end detail --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            {{-- best Product --}}

    </div>
    {{-- end container --}}
</div>
{{-- end livewire --}}
