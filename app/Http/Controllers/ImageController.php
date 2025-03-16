<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;

use Auth;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    // create
    public function create()
    {
        return view('images.image-upload');
    }

    public function store(Request $request)
    {
        logger('test', ['file' => __FILE__, 'line' => __LINE__]);
        $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'synopsis' => 'required|max:5000',
            'image' => 'required|image',
        ]);

        //まとめてもかける
        // $inputs = $request->only(['name', 'image', 'job']);
        $name = $request->input('name');
        $author = $request->input('author');
        $synopsis = $request->input('synopsis');

        //ファイル取得
        $file = $request->file('image');

        //ファイル名取得・保存用ファイル名作成更新
        $originalName = $file->getClientOriginalName();
        $filename = time() . '_' . $originalName;
        $image_path = 'Images/' . $filename;

        // サイズ取得
        $size = $file->getSize();

        // 画像の保存処理
        Log::info("ログ",['filename' => $filename]);
        Log::info("ログ",['image_path' => $image_path]);
        Log::info("ログ",['originalName' => $originalName]);
        Storage::disk('public')->putFileAs('Images/' , $file, $filename);

        // データベースに画像情報を保存
        $image = new Image;
        $image->uuid = Str::uuid();
        $image->name = $name;
        $image->author = $author;
        $image->synopsis = $synopsis;
        $image->path = $image_path;
        $image->size = $size;
        $image->save();

        return $this->show($image->id)->with('success', '画像がアップロードされました。');

    }

    // 画像の表示
    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('images.image-show', ['image' => $image]);
    }

    // 画像の表示(ランダム)
    public function random()
    {
        $imageIds = array();

        $favorites = Auth::user()->getLikeimageId();

        foreach ($favorites as $fav) {
            $imageIds[] = $fav['image_id'];
        }

        $image = Image::whereNotIn('id', $imageIds)->inRandomOrder()->first();

        // $image = Image::inRandomOrder()->first();

        return view('images.image-random', ['image' => $image]);
    }

    //  update
    public function edit(Image $image)
    {
        return view('images.image-edit', compact('image'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'synopsis' => 'required|max:5000',
        ]);

        $image = Image::findOrFail($id);

        // データの更新
        $image->name = $request->name;
        $image->author = $request->author;
        $image->synopsis = $request->synopsis;
        $image->save();

        return redirect()->route('images.index')
                         ->with('success', '画像が編集されました。');
    }
    

    // delete
    public function destroy($uuid)
    {
        $image = Image::where('uuid', $uuid)->firstOrFail();

        $image_path = $image->path;

        Log::info("ログ",['request_log' => $image_path]);

        if($image_path && Storage::disk('public')->exists($image_path)) {
            Log::info("ログ",['image_path' => $image_path]);
            Log::info("ログ",['IF' => 'IN']);
            Storage::disk('public')->delete($image_path);
        }

        Log::info("ログ",['IF' => 'OUT']);

        // データベースから画像レコードの削除
        $image->forceDelete();

        return redirect()->route('images.index')
                         ->with('success', '画像が削除されました。');
    }

    public function like($id)
    {
        if(Auth::user()->islike($id)){
            //存在
            Auth::user()->unlike($id);
            return false;
        } else {
            //存在していない
            Auth::user()->like($id);
            return true;
        }
    }

    public function unlike($id)
    {
        Auth::user()->unlike($id);
        return false; //レスポンス内容
    }

    public function checkLike($id)
    {
        if(Auth::user()->islike($id)){
            //存在
            return true;
        } else {
            //存在していない
            return false;
        }
    }

    // view favorite index
    public function favorite()
    {

        $imageIds = array();

        $favorites = Auth::user()->getLikeimageId();

        foreach ($favorites as $fav) {
            $imageIds[] = $fav['image_id'];
        }

        $likedimages = Image::whereIn('id', $imageIds)->get();

        return view('images.favorite', ['images' => $likedimages]);
    }
}
