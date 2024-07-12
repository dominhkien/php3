<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.addproduct')}}" method="post">
        @csrf
        <label for="">name</label>
        <input type="text" name="name">
        <label for="">price</label>
        <input type="number" name="price">
        <label for="">view</label>
        <input type="number" name="view">
        <label for="">category</label>
        <select name="category" id="">
            <option value="" disabled selected>Category</option>
            @foreach ( $category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <button>add</button>
    </form>
</body>
</html>