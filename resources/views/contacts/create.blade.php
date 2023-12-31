<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts - Create</title>
    <style>
        div.head {
            height: 200px;
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
    <script>
      function validateForm() {
          var nameInput = document.getElementById('name');
          var contactInput = document.getElementById('contact');
          
          if (nameInput.value.length < 5) {
              alert('The name must have at least 5 characters.');
              return false;
          }
          
          if (contactInput.value.length != 9) {
              alert('The contact must have 9 characters.');
              return false;
          }
          return true;
      }
  </script>
</head>
<body>
    <div class="head">
        <h1>Create a contact</h1>
    </div>
    <div>
        <form action="{{ route('contact.create') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" required>
        
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            
            <input type="submit" value="Submit">
            <a class="danger-btn" href="{{ route('index') }}">Cancel</a>
        </form>
    </div>
</body>
</html>