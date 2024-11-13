<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">登録画面</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/trip_locations" method="post" class="bg-light p-4 rounded">
        @csrf

        <div class="mb-3">
            <label for="famousplace" class="form-label">名所</label>
            <input type="text" name="famousplace" id="famousplace" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="country" class="form-label">地域名</label>
            <select name="country" id="country" class="form-select" required>
                <option value="" disabled selected>選択してください</option>
                <option value="1">アジア</option>
                <option value="2">ヨーロッパ</option>
                <option value="3">中東</option>
                <option value="4">アフリカ</option>
                <option value="5">アメリカ・南米</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">画像URL</label>
            <textarea name="image_url" id="image_url" class="form-control" rows="3" required placeholder="画像のURLを入力してください"></textarea>
        </div>

        <div class="mb-3">
            <label for="descriptions" class="form-label">詳細</label>
            <textarea name="description" id="descriptions" class="form-control" rows="5" placeholder="詳細を入力してください"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeo5zhzZYhbklIG3yDkKDVhfuDqzv0HR3E5Y2mHcvnYzFz9x" crossorigin="anonymous"></script>
</body>
</html>