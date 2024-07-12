<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.update',$product->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="">name</label>
        <input type="text" name="name" value="{{$product->name}}">
        <label for="">price</label>
        <input type="number" name="price" value="{{$product->price}}">
        <label for="">view</label>
        <input type="number" name="view" value="{{$product->view}}">
        <label for="">category</label>
        <select name="category_id" id="">
            @foreach ( $category as $item)
                <option value="{{$item->id}}" {{$product->category_id == $item->id ? 'selected' : '' }}>
                    {{$item->name}}
                </option>
            @endforeach
        </select>
        <button>edit</button>
    </form>
</body>
</html>