<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact - Details</title>
    <style>
        a.danger-btn {
            width: 100%;
            background-color: #d80000;
            color: white;
            padding: 10px 11px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 auto;
            max-width: 200px;
            text-decoration: none;
        }
        
        a.danger-btn:hover {
            background-color: #a10000;
        }
    </style>
</head>
<body>
    <h1>Contact Details</h1>

    <p><b>{{$contact->name}}</b></p>
    <ul>
        <li>Phone Number: {{$contact->contact}}</li>
        <li>Email: {{$contact->email}}</li>
    </ul>
    <a class="danger-btn" href="{{ route('index') }}">Back</a>
</body>
</html>