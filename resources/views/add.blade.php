<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('users.add')}}" method="post">
        @csrf
        name
        <input type="text" name="name">
        email
        <input type="email" name="email">
        phong ban
        <select name="phongban" id="">
            <option value="" disabled selected>Phong ban</option>
            @foreach ($phongban as $item)
                <option value="{{$item->id}}">{{$item->ten_donvi}}</option>
            @endforeach
        </select>
        tuoi
        <input type="numer" name="tuoi">
        <button>ADD</button>
    </form>
</body>
</html>