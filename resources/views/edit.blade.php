<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('users.edit',$user->id)}}" method="post">
        @csrf
        @method('PUT')
        name
        <input type="text" name="name" value="{{$user->name}}">
        email
        <input type="email" name="email" value="{{$user->email}}">
        phong ban
        <select name="phongban" id="" >
            <option value="{{$user->phongban_id}}">{{$user->ten_donvi}}</option>
            @foreach ($phongban as $item)
                <option value="{{$item->id}}">{{$item->ten_donvi}}</option>
            @endforeach
        </select>
        tuoi
        <input type="numer" name="tuoi" value="{{$user->tuoi}}">
        <button>edit</button>
    </form>
</body>
</html>