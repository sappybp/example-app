@extends('base')

@section('title', '編集')

@section('content')
<button type="button" onclick="window.history.back();" class="h5 text-white">前の画面へ戻る</button>
<div class="mx-auto max-w-md bg-white p-4 rounded-md shadow-sm">
    @if ($image)
    <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <figure>
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}" class="rounded-t-lg">
            </figure> 
            <label for="name" class="pb-2">画像名</label>
            <input type="text" id="name" name="name" value="{{ $image->name }}" class="form-control">
            <input type="text" id="author" name="author" value="{{ $image->author }}" class="form-control">
            <textarea id="synopsis" name="synopsis" class="w-100" rows="8" style="height:100%;">{{ $image->synopsis }}</textarea>
        </div>

        <!-- その他の編集可能なフィールド -->

        <div class="flex justify-start gap-4">
            <button type="button" onclick="window.history.back();" class="btn btn-secondary">戻る</button>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
    @else
    <div class="container">
        <p class="h5">本が見つかりませんでした。</p>
    </div>
    @endif
</div>
@endsection