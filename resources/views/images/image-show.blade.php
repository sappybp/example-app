@extends('base')

@section('title', '画像詳細')

@section('content')
    <button type="button" onclick="window.history.back();" class="h5 text-white">前の画面へ戻る</button>
    @if ($image)
    <div class="mx-auto max-w-md bg-white p-4 rounded-md shadow-sm">
        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}" class="img-fluid mx-auto">

        <div class="my-4 position-relative">
            <div id="app" data-v-app class="position-absolute top-2 right-2">
                <like-component :image_id="{{$image->id}}"></like-component>
            </div>
            <p class="h2 text-center">{{ $image->name }}</p>
            <p class="h4 text-center">{{ $image->author }}</p>
            <p class="mt-3 mb-5">{{ $image->synopsis }}</p>
            <!-- ここにその他の画像詳細情報を表示 -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('images.index') }}" class="btn btn-primary">一覧</a>
                <a href="{{ route('images.edit', $image->id) }}" class="btn btn-success">編集</a>
                <form action="{{ route('images.destroy', $image->uuid) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <p class="h5">本が見つかりませんでした。</p>
    </div>
    @endif
@endsection
@section('script')
    @vite('resources/js/app.js') {{-- ViteによるJavaScriptの読み込み --}}
@endsection