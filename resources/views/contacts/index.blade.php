<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts - Home</title>
    <style>
        div.head {
            height: 200px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: center;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }

        .primary-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 2px solid #3498db; 
            color: #3498db; 
            background-color: #fff; 
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin: 0 auto;
            max-width: 200px;
        }

        .primary-btn:hover {
            background-color: #3498db; 
            color: #fff; 
        }

        .secondary-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 2px solid #01ac87; 
            color: #01ac87; 
            background-color: #fff; 
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .secondary-btn:hover {
            background-color: #01ac87; 
            color: #fff; 
        }

        .danger-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 2px solid #e74c3c;
            color: #e74c3c;
            background-color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .danger-btn:hover {
            background-color: #e74c3c;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1>Manage your contacts</h1>
        <a class="primary-btn" href="{{ route('contact.create') }}">REGISTER</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->contact}}</td>
                <td>{{$contact->email}}</td>
                <td>
                    <a href="{{route('contact.edit')}}" class="secondary-btn">EDIT</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('contact.delete', ['id' => $contact->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger-btn">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>