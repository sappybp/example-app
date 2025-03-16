@extends('base')

@section('title', 'あらすじ')

@section('content')
    <button type="button" onclick="window.history.back();" class="h5 text-white">前の画面へ戻る</button>
    <div class="position-absolute top-50 start-50 translate-middle bg-white p-5 rounded-md shadow-sm" style="width: 430px;">
        @if ($image)
        <div id="app" data-v-app class="position-absolute top-6 right-6">
                <like-component :image_id="{{$image->id}}"></like-component>
        </div>
        <div class="my-4">
            <p>{{ $image->synopsis }}</p>
        </div>
        @else
        <div class="container">
            <p class="h5">本が見つかりませんでした。</p>
        </div>
        @endif
    </div>
@endsection
@section('script')
    @vite('resources/js/app.js') {{-- ViteによるJavaScriptの読み込み --}}
@endsection