<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <p>{{$list_id4->id}}</p>
    <p>{{$list_id4->name}}</p>
    <p>{{$list_id4->email}}</p>
    <p>{{$list_id16}}</p> --}}
    <a href="{{route('users.showadd')}}">ADD</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONG BAN</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showuser as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->ten_donvi}}</td>
                <td>
                    <button>
                        <a href="{{route('users.updateuser',$item->id)}}">EDIT</a>
                    </button>
                    
                    <button onclick="return confirm('CHAC CHAN MUON XOA?')">
                        <a href="{{route('users.delete', $item->id)}}" >DELETE</a>
                    </button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
    
    
</body>
</html>