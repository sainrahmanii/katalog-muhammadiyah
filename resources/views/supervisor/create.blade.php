@extends('master')
@section('title', 'create-shop')

@section('content')

    <h1 class="font-semibold text-center text-xl">Tambah Toko</h1>
    <div class="lg:mx-56">
        <form action="{{ route('katalog.store') }}" method="post">
            @csrf
            <div class="lg:px-16 px-5 rounded-lg shadow-lg pb-7">
                <div class="block my-4">
                    <label for="" class="text-grey">Pilih User</label>
                    <select name="user_id"
                        class="appearance-none input-field rounded-full outline-slate-200 px-5 w-full">
                        <option value="" selected>Pilih User</option>
                        @foreach ($users as $user)
                            @if ($user->role == 'USER')
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label class="block my-4">
                    <span class="block text-sm font-medium text-slate-700">Nama Toko</span>
                    <input type="text" class="rounded-full outline-slate-200 px-5 w-full" required name="nama_toko"
                        value="{{ old('nama_toko') }}" />
                    @error('nama_toko')
                        <div class="text-red-500 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label class="block my-4">
                    <span class="block text-sm font-medium text-slate-700">Nomor Whatsapp</span>
                    <input type="number" class="rounded-full outline-slate-200 px-5 w-full" required name="no_whatsapp"
                        value="{{ old('no_whatsapp') }}" />
                    @error('no_whatsapp')
                        <div class="text-red-500 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </label>
                <label class="hidden">
                    <input type="text" class="rounded-full outline-slate-200 px-5 w-full" required name="role" value="SELLER" />
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
