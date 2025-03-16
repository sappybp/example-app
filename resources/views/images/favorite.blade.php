@extends('base')

@section('title', 'お気に入り本棚')

@section('content')
<p class="h1 text-white">お気に入り本棚</p>
@if ($images)
<div class="row">
    @foreach ($images as $image)
        <div class="mx-auto max-w-md m-5 bg-white p-5 rounded-md shadow-sm">
            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}" class="w-full h-auto mx-auto">
            <p class="text-center text-gray-600 mt-4"><a href="{{ route('images.show', $image->id) }}">{{ $image->name }}</a></p>
        </div>
    @endforeach
</div>
@else
<div class="container">
    <p class="h5">本が見つかりませんでした。</p>
</div>
@endif

@endsection