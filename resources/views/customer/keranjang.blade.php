@extends('master')
@section('title', 'Keranjang')

@section('content')
    <h1 class="text-center font-semibold text-3xl">My Cart</h1>
    <div class="rounded-lg shadow-xl">
        <div class="py-7 mx-5 overflow-x-scroll">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-300 border">
                    <th class="py-2">No.</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </thead>
                @foreach ($product as $product)
                    <tbody class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ Storage::url('public/image-products/') . $product->product->image }}"
                                class="w-24 h-16 border object-cover max-w-32 mx-auto rounded-2xl" alt=""></td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>Rp {{ number_format((int) $product->product->harga) }}</td>
                        <td class="font-semibold">Rp {{ number_format((int) $product->subtotal) }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('destroy.keranjang', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-red-400 px-2 py-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="py-10 mx-10">
            <div class="flex justify-end">
                <table class="lg:w-1/2 w-full">
                    <tr class="border-b">
                        <td>Jumlah Jenis Barang</td>
                        <td class="flex justify-end font-semibold">{{ $jumlah_barang }} Jenis</td>
                    </tr>
                    <tr class="border-b">
                        <td>Jumlah Barang</td>
                        <td class="flex justify-end font-semibold">{{ $quantity }}</td>
                    </tr>
                    <tr class="border-b">
                        <td>Total</td>
                        <td class="flex justify-end font-semibold text-2xl items-center">Rp
                            {{ number_format((int) $subtotal) }}</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-end mt-5">
                <a href="{{ route('checkout') }}" class="px-10 py-2 font-semibold text-white bg-emerald-500 rounded-full">
                    Checkout
                </a>
            </div>
        </div>
    </div>
@endsection
