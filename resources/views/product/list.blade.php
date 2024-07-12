<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <a href="{{ route('product.add') }}">add</a>
    <div>
        <form action="{{route('product.list')}}" method="get">
            <input type="text" name="search">
            <button>search</button>
        </form>
    </div>
    <table class="table table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>Price</th>
                <th>View</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->view }}</td>
                    <td>
                        <a href="{{ route('product.edit', $item->id) }}">edit</a>
                        <a href="{{ route('product.delete', $item->id) }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
