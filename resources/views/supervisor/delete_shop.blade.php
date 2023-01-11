@extends('master')
@section('title', 'Delete Shop')

@section('content')

    <h1 class="font-bold text-xl text-center mb-3">Edit Toko</h1>
    <div class="grid lg:grid-cols-2 gap-5 grid-cols-1">
        @forelse ($delete as $delete)
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('katalog.destroy', $delete->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <div class="lg:px-8 px-2 py-2 flex items-center justify-between border rounded-lg shadow-lg">
                    <img src="https://img.icons8.com/3d-fluency/70/null/shop.png" class="mr-5" />
                    <h1 class="text-xl font-semibold">{{ $delete->name }}</h1>
                    <h1 class="font-semibold text-md">{{ $delete->no_whatsapp }}</h1>
                    <button type="submit" class="bg-red-600 px-3 py-2 font-semibold text-white rounded-md">HAPUS</button>
                </div>
            </form>
        @empty
            <h2 class="font-bold text-2xl text-center mt-5">Belum ada penjual !</h2>
        @endforelse
    </div>
@endsection

{{-- <form>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
</form> --}}
