@extends('master')

@section('title', 'Admin | Katalog-Muhammadiyah')

@section('content')
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
        <a href="{{ route('katalog.all') }}">
            <div class="border rounded-lg shadow-md hover:shadow-xl">
                <img src="https://img.icons8.com/3d-fluency/200/null/shop.png" class="mx-auto"/>
                <div class="pb-7 px-3">
                    <h1 class="font-semibold text-center text-2xl">Lihat Semua Toko</h1>
                </div>
            </div>
        </a>
        <a href="{{ route('katalog.create') }}">
            <div class="border rounded-lg shadow-md hover:shadow-xl">
                <img src="https://img.icons8.com/3d-fluency/200/null/shop.png" class="mx-auto"/>
                <div class="pb-7 px-3">
                    <h1 class="font-semibold text-center text-2xl">Tambah Toko</h1>
                </div>
            </div>
        </a>
        <a href="{{ route('katalog.edit') }}">
            <div class="border rounded-lg shadow-md hover:shadow-xl">
                <img src="https://img.icons8.com/3d-fluency/200/null/shop.png" class="mx-auto"/>
                <div class="pb-7 px-3">
                    <h1 class="font-semibold text-center text-2xl">Edit Toko</h1>
                </div>
            </div>
        </a>
        <a href="{{ route('katalog.delete') }}">
            <div class="border rounded-lg shadow-md hover:shadow-xl">
                <img src="https://img.icons8.com/3d-fluency/200/null/shop.png" class="mx-auto"/>
                <div class="pb-7 px-3">
                    <h1 class="font-semibold text-center text-2xl">Hapus Toko</h1>
                </div>
            </div>
        </a>
    </div>

@endsection
