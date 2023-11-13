
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contacts - Edit</title>
        <style>
            div.head {
                height: 100px;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }
            
            input[type=text], input[type=email] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            
            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin: 0 auto;
                max-width: 200px;
            }
            
            input[type=submit]:hover {
                background-color: #45a049;
            }

            a.danger-btn {
                width: 100%;
                background-color: #d80000;
                color: white;
                padding: 13px 20px;
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
            
            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="head">
            <h1>Edit a contact</h1>
        </div>
        <div>
            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                @METHOD('PUT')
                @csrf

                <label for="name">Name</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $contact->name)}}">
            
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" required value="{{ old('contact', $contact->contact)}}">
            
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email', $contact->email)}}">
                
                <input type="submit" value="Submit">
                <a class="danger-btn" href="{{ route('index') }}">Cancel</a>
            </form>
        </div>
    </body>
</html>