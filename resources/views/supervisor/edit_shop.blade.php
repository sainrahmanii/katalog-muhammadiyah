@extends('master')
@section('title', 'Edit Shop')

@section('content')

    <h1 class="font-bold text-xl text-center mb-3">Edit Toko</h1>
    <div class="grid lg:grid-cols-2 gap-5 grid-cols-1">
        @forelse ($edit as $edit)
            <a href="{{ route('katalog.edit.shop', $edit->id) }}">
                <div class="px-8 py-2 flex items-center justify-between border rounded-lg shadow-lg">
                    <img src="https://img.icons8.com/3d-fluency/70/null/shop.png" class="mr-5" />
                    <h1 class="text-xl font-semibold">{{ $edit->name }}</h1>
                    <h1 class="font-semibold text-md">{{ $edit->no_whatsapp }}</h1>
                </div>
            </a>

        @empty
            <h2 class="font-bold text-2xl text-center mt-5">Belum ada penjual !</h2>
        @endforelse
    </div>
@endsection
