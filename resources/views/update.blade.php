<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | Page</title>
</head>
<body style="background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <center>
        <form action="{{ route('update', $user->id) }}" method="POST" style="background-color: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
            @csrf
            @method('PUT') <!-- Ensures Laravel treats this as PUT -->

            <h2 style="color: #333;">Update Form</h2>
            @if(session('success'))
                <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
            @endif

            @if($errors->any())
                <p style="color: red; font-weight: bold;">{{ $errors->first() }}</p>
            @endif

            <div>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Enter username" style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter email" style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div>
                <input type="password" name="password" placeholder="Enter new password (leave blank to keep current password)" style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Update
            </button>
        </form>
    </center>
</body>
</html>
