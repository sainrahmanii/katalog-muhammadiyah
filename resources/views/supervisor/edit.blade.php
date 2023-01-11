@extends('master')
@section('title', 'edit-shop')

@section('content')

    <h1 class="font-semibold text-center text-xl">Edit Toko</h1>
    <div class="lg:mx-56">
        <form action="{{ route('katalog.update.shop', $seller->id) }}" method="post">
            @csrf
            @method('put')
            <div class="lg:px-16 px-5 rounded-lg shadow-lg pb-7">
                <label class="block my-4">
                    <span class="block text-sm font-medium text-slate-700">Nama Toko</span>
                    <input type="text" class="rounded-full outline-slate-200 px-5 w-full" required name="nama_toko" value="{{ old('nama_toko', $seller->nama_toko) }}"/>
                    @error('name')
                        <div class="text-red-500 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <div class="flex justify-end">
                    <button type="submit" class="px-12 py-3 bg-blue-500 rounded-full text-white font-semibold">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
