<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅行先</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
{{-- resources/home/trip_locations/index.blade.php --}}
<div class="trip">
    <h1>旅先一覧</h1>
</div>

<!-- 登録成功メッセージ -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="register">
        <input type="button" class='btn btn-register'onclick="location.href='/trip_locations/create'" value="登録画面へ" >
    </div>
    <form action="/trip_locations/store" method="post">
        @csrf
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名所</th>
                    <th>地域</th>
                    <th>画像</th>
                    <th>詳細</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trip_locations as $trip_location)
                    <tr>
                    <th scope="row">{{$trip_location->id}}</th>
                    <td>{{ $trip_location->famousplace }}</td>
                        <td>
                        @if($trip_location->country == '1')
                            アジア
                        @elseif($trip_location->country == '2')
                            ヨーロッパ
                        @elseif($trip_location->country == '3')
                            中東
                        @elseif($trip_location->country == '4')
                            アフリカ
                        @elseif($trip_location->country == '5')
                            アメリカ・南米
                        @endif
                        </td>
                    <td>
                        <!-- 画像クリックを可能にする -->
                        <a href="{{ $trip_location->image_url }}" target="_blank">
                            <img src="{{ $trip_location->image_url }}" alt="画像" style="width: 100px; height: auto;">
                        </a>
                    </td>
                        <td>{{ $trip_location->description }}</td>
                        <td>{{ $trip_location->updated_at }}</td>
                        <td><a href="/trip_locations/edit/{{ $trip_location->id }}">編集</a></td>
                    </tr>
                @endforeach
        </table>
    </form>
</body>
</html>