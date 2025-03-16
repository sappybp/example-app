# バーチャル図書館
実際に図書館へ訪れるわくわくを  
自分と相性の良い本との出会いを  
  
# 環境
PHP 8.4  
Laravel 12.0.1  
vue 3.2.37  
MySQL  
Docker Laravel Sail  
Ubuntu  

# 背景
進む読書離れに歯止めをかけるべく、誰でも手軽に本に出合えることをコンセプトにしようと考えました。
図書館によく行く人たちは「そこでたまたま出会えた本を読むのが好き」ということを言います。
このバーチャル図書館では、ランダムであらすじを表示する機能を付けることによって偶然感を演出し、
出会えた本にわくわくするよう工夫を加えました。

# 機能
- ユーザー新規登録機能
- ログイン、ログアウト機能
- 書籍登録、一覧表示、詳細表示、更新、削除機能
- お気に入り登録（非同期処理）

# スクリーンショット
- トップページ  
![welcom](https://github.com/user-attachments/assets/f642cf33-2459-4a05-8190-0eb2d469a986)  

- 一覧ページ  
![index](https://github.com/user-attachments/assets/4eab6fa1-63a1-4ebd-b5ed-eb1be9d01578)  

- 詳細ページ  
![show](https://github.com/user-attachments/assets/79266787-842c-48c9-a909-5e1cd665b568)  

- 編集ページ  
![update](https://github.com/user-attachments/assets/132ff5c8-f644-42c9-90fe-1ac1e87b76e1)  

- 書籍登録ページ  
![create](https://github.com/user-attachments/assets/5f3868ab-ae58-472c-b983-f830afb07dc8)  

- あらすじランダム表示ページ  
　あらすじをランダムに一つ表示、すでにお気に入りのあらすじは表示されないように調整  
![random](https://github.com/user-attachments/assets/c9f64fca-2d6c-4139-a4c0-226741110eb0)  

- お気に入り機能  
　vueを用いた非同期処理のお気に入り登録機能を実装  
![favoriteNon](https://github.com/user-attachments/assets/3a8eb6ba-771f-4824-8357-e24fb2d4a7bb)
![favoriteYes](https://github.com/user-attachments/assets/fd55920f-0315-4879-97f6-8a51ca3a3fa5)  

- お気に入り一覧  
![favoriteShelf](https://github.com/user-attachments/assets/b3c5daa2-9192-40ed-902d-2c9ab889392b)  


