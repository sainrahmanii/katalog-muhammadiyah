@extends('master')
@section('title', 'Produk')

@section('content')
    <div class="flex flex-row flex-wrap py-4">
        <main role="main" class="w-full pr-5 pt-1 sm:w-2/3 md:w-2/3">
          <section id="gallery">
            <img src="{{ Storage::url('public/image-products/') . $product->image }}" alt="" class="w-full mt-6 rounded-2xl border">
          </section>
          <section class="" id="orders">
            <h1 class="mt-5 mb-3 text-lg font-semibold">Detail</h1>
            <div class="text-gray-500">
              <p class="pb-4">
                {{ $product->detail }}
              </p>
            </div>
          </section>
        </main>
        <aside class="w-full sm:w-1/3 md:w-1/3">
          <div class="top-0 w-full pt-4 md:mt-3">
            <div class="p-6 border rounded-2xl">
              <div class="mb-4">
                <div class="mb-2">
                    <h3 class="font-semibold text-xl text-center">{{ $product->name }}</h3>
                    <div class="my-2">
                      <div class="flex items-center justify-between my-5">
                        <h2>Tambah Pesanan :</h2>
                        <div class="flex items-center justify-between rounded-full ring-4 ring-emerald-300">
                            <button onclick="{{ $decrement }}">
                              <div class="px-3 decrement-btn cursor-pointer">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                              </div>
                            </button>
                            <h3 class="font-bold">{{ $jumlah }}</h3>
                            <div class="px-3 increment-btn cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                  </svg>
                            </div>
                        </div>
                      </div>
                      <div class="flex items-center justify-between">
                        <h2>Subtotal :</h2>
                        <h1 class="font-semibold text-xl">Rp {{ number_format((int) $product->harga * (int)$jumlah) }}</h1>
                      </div>
                    </div>
                </div>
              </div>
              <a>
                <button class="bg-emerald-400 ring-1 text-white hover:bg-emerald-500 ring-emerald-400 w-full py-2 rounded-full font-semibold">+ Keranjang</button>
              </a>
              <a>
                <button class="ring-1 mt-2 text-emerald-400 ring-emerald-400 w-full py-2 rounded-full font-semibold">Beli</button>
              </a>
            </div>
          </div>
        </aside>
      </div>
@endsection