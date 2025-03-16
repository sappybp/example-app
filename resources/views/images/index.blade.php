@extends('base')

@section('title', '本棚')

@section('content')
<!-- アップロード成功メッセージ -->
@if (session('success'))
<div class="position-sticky h-50 top-0">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<p class="h1 text-white">本棚</p>
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