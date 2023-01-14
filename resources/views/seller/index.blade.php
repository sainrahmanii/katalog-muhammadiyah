@extends('master')
@section('title', 'Seller')

@section('content')

    <div class="rounded-lg shadow-xl">
        <div class="my-7 mx-5 overflow-x-scroll">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-300 border">
                    <th class="py-2">No.</th>
                    <th>Nama Produk</th>
                    <th>Ketersediaan</th>
                    <th>Harga Produk</th>
                    <th>Gambar Produk</th>
                    <th>Action</th>
                </thead>
                @foreach ($products as $product)
                <tbody class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        @if ($product->available == 1)
                            <td><span class="bg-emerald-500 px-5 py-1 rounded-full font-bold text-white">TERSEDIA</span></td>
                        @elseif ($product->available == 0)
                            <td><span class="bg-red-500 px-5 py-1 rounded-full font-bold text-white">TIDAK TERSEDIA</span></td>
                        @endif
                        <td>Rp {{ number_format((int) $product->harga) }}</td>
                        <td><img src="{{ Storage::url('public/image-products/').$product->image }}" class="w-24 max-w-32 mx-auto rounded-2xl" alt=""></td>
                        <td class="flex gap-1 justify-center items-center">
                            <a href="{{ route('seller.edit', $product->id) }}">
                                <button class="bg-cyan-400 px-2 py-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="w-5 h-5 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                            </a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('seller.destroy', $product->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-red-400 px-2 py-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="w-5 h-5 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tbody>
                    @endforeach
            </table>
            <div class="flex justify-end py-5">
                <a href="{{ route('seller.create') }}"><button
                        class="bg-emerald-400 px-7 py-2 rounded-full text-white font-semibold">CREATE</button></a>
            </div>
        </div>
    </div>

@endsection
