@extends('master')
@section('title', 'CREATE PRODUCT')

@section('content')

    <div class="shadow-xl rounded-xl lg:mx-36 mx-7">
        <div class="px-3 lg:px-12 py-5">
            <h1 class="text-center font-semibold text-xl">CREATE PRODUCT</h1>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Nama Produk</span>
                <input type="text" class="rounded-full outline-slate-200 px-5 w-full" required name="name" />
                @error('name')
                    <div class="text-red-500 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <div class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Ketersediaan</span>
                <select name="user_id" class="appearance-none input-field rounded-full outline-slate-200 px-5 w-full">
                    <option value="AVAILABLE" selected>Tersedia</option>
                    <option value="UNAVAILABLE">Tidak Tersedia</option>
                </select>
            </div>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Detail Produk</span>
                <textarea type="text"  class="rounded-lg outline-slate-200 px-5 w-full" required name="detail" ></textarea>
                @error('detail')
                    <div class="text-red-500 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="block my-4">
                <span class="block text-sm font-medium text-slate-700">Foto Produk</span>
                <input type="file"
                    class="block w-full text-sm text-slate-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            outline-none
            file:bg-emerald-400 file:text-emerald-900
            hover:file:bg-emerald-500 file:cursor-pointer"
                    accept="image/*" required name="image" />
                @error('image')
                    <div class="text-red-500 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </label>
        </div>
    </div>

@endsection
