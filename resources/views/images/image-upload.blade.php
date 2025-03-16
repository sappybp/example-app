@extends('base')

@section('title', '本情報作成')

@section('content')
<button type="button" onclick="window.history.back();" class="h5 text-white">前の画面へ戻る</button>
<div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
    <div class="text-center">
        <h1 class="my-3 text-3xl font-semibold text-gray-700">本情報作成</h1>
        <p class="text-gray-400">アップロードする本の情報を入力してください</p>
    </div>
    <div class="m-7">
        <form action="store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm text-gray-600">本のタイトル</label>
                <input type="text" name="name" id="name" placeholder="本のタイトル" class="w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none" required>
            </div>
            <div class="mb-6">
                <label for="author" class="block mb-2 text-sm text-gray-600">著者</label>
                <input type="text" name="author" id="author" placeholder="著者" class="w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none" required>
            </div>
            <div class="mb-6">
                <label for="synopsis" class="block mb-2 text-sm text-gray-600">あらすじ</label>
                <textarea type="text" name="synopsis" id="synopsis" placeholder="あらすじ" class="w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none" required></textarea>
            </div>
            <div class="mb-6">
                <label for="image" class="block mb-2 text-sm text-gray-600">画像</label>
                <input type="file" name="image" id="image" class="w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none" required>
            </div>
            <div class="mb-6">
                <button type="submit" class="w-full px-3 py-4 text-white bg-blue-500 rounded-md focus:bg-blue-600 focus:outline-none">アップロード</button>
            </div>
        </form>
    </div>
</div>
@endsection