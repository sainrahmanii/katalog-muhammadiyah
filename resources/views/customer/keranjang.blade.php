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
                </thead>
                @foreach ($product as $product)
                    <tbody class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ Storage::url('public/image-products/') . $product->product->image }}"
                            class="w-24 h-16 border object-cover max-w-32 mx-auto rounded-2xl" alt=""></td>
                            <td>{{ $product->product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>Rp {{ number_format((int)$product->product->harga) }}</td>
                            <td class="font-semibold">Rp {{ number_format((int) $product->subtotal) }}</td>
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
                        <td class="flex justify-end font-semibold text-2xl items-center">Rp {{ number_format((int)$subtotal) }}</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-end mt-5">
                <a href="" class="px-10 py-2 font-semibold text-white bg-emerald-500 rounded-full">
                    Checkout
                </a>
            </div>
        </div>
    </div>
@endsection
