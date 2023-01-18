@extends('master')
@section('title', 'Katalog')

@section('content')
    <div class="flex flex-row flex-wrap py-4">
        <main role="main" class="w-full lg:pr-5 pt-1 sm:w-2/3 md:w-2/3">
            @foreach ($product as $product)
                <section id="gallery">
                    <img src="{{ url(Storage::url('public/image-products/') . $product->image) }}" alt=""
                        class="w-full mt-6 rounded-2xl border">
                </section>
                <section class="" id="orders">
                    <h1 class="mt-5 mb-3 text-lg font-semibold">Detail</h1>
                    <div class="text-gray-500">
                        <p class="pb-4">
                            {{ $product->detail }}
                        </p>
                    </div>
                </section>
            @endforeach
        </main>
        <livewire:counter :product="$product">
    </div>
@endsection
