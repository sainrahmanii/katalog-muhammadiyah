@extends('master')
@section('title', 'Katalog')

@section('content')

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse ($products as $product)
            <div class="border rounded-xl">
                <img src="{{ Storage::url('public/image-products/') . $product->image }}" alt=""
                    class="h-56 w-full object-cover rounded-t-xl">
                <div class="mx-3 mb-3">
                    <h1 class="text-xl font-semibold truncate">{{ $product->name }}</h1>
                    <div class="flex items-center justify-between">
                        <h1 class="my-1 font-semibold text-slate-800 truncate">{{ $product->detail }}</h1>
                        @if ($product->available == 1)
                            <span class="bg-green-400 rounded-full text-sm font-bold px-3 py-1">TERSEDIA</span>
                        @elseif ($product->available == 0)
                            <span class="bg-red-400 rounded-full text-sm font-bold px-3 py-1">HABIS</span>
                        @endif
                    </div>
                    @if ($product->available == 1)
                        <a href="{{ route('show', $product->slug) }}">
                            <button class="bg-emerald-300 w-full mt-2 px-3 py-2 rounded-lg font-semibold">Rp
                        {{ number_format((int) $product->harga) }}</button>
                        </a>
                    @elseif ($product->available == 0)
                    <button class="bg-slate-200 cursor-not-allowed w-full mt-2 px-3 py-2 rounded-lg font-semibold">Rp
                        {{ number_format((int) $product->harga) }}</button>
                    @endif
                </div>
            </div>
        @empty
        @endforelse

    </div>
    </div>

@endsection
