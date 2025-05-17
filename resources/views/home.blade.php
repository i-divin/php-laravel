<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body style="background-color: #f4f4f4; font-family: Arial, sans-serif; text-align: center;">

    <!-- Welcome Box -->
    <div style="background-color: white; padding: 20px; border-radius: 10px; width: 350px;
                box-shadow: 0px 4px 10px rgba(0,0,0,0.2); margin: 50px auto;">
        
        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <p style="color: red; font-weight: bold;">{{ $errors->first() }}</p>
        @endif

        <h2 style="color: #333;">Welcome to Our Web</h2>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    style="padding: 12px 20px; background-color: #dc3545; color: white; 
                           border: none; border-radius: 5px; cursor: pointer; font-weight: bold;"
                    onmouseover="this.style.backgroundColor='#b71c1c'" 
                    onmouseout="this.style.backgroundColor='#dc3545'">
                Logout
            </button>
        </form>
    </div>

    <!-- User Management Section -->
    <div style="margin-top: 30px;">
        <h2 style="color: #333;">Manage Users</h2>
        <table border="1" cellspacing="0" style="width: 60%; margin: auto; text-align: left; 
                border-collapse: collapse; box-shadow: 0px 3px 10px rgba(0,0,0,0.1);">
          <thead>
            <tr style="background-color:rgb(76, 94, 114); color: white;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">USERNAME</th>
                <th style="padding: 10px;">EMAIL</th>
                <th style="padding-left: 80px;" colspan="2">ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_users as $all)
            <tr style="background-color: white; border-bottom: 1px solid #ddd;">
                <td style="padding: 10px;">{{$all->id}}</td>
                <td style="padding: 10px;">{{$all->username}}</td>
                <td style="padding: 10px;">{{$all->email}}</td>
                <td style="padding: 10px;">
                   <form action="{{route('update', $all->id)}}" method="post">
                       @csrf
                       @method('PUT')
                       <button type="submit" 
                               style="padding: 8px 12px; font-size: 14px; font-weight: bold; 
                                      border: none; border-radius: 5px; cursor: pointer; 
                                      background-color: #ffc107; color: white; transition: 0.3s ease-in-out;"
                               onmouseover="this.style.backgroundColor='#d39e00'" 
                               onmouseout="this.style.backgroundColor='#ffc107'">
                           Update
                       </button>
                   </form>
                </td>
               
                <td style="padding: 10px;">
                    <form action="{{route('delete', $all->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                style="padding: 8px 12px; font-size: 14px; font-weight: bold; 
                                       border: none; border-radius: 5px; cursor: pointer; 
                                       background-color: #dc3545; color: white; transition: 0.3s ease-in-out;"
                                onmouseover="this.style.backgroundColor='#b71c1c'" 
                                onmouseout="this.style.backgroundColor='#dc3545'"
                                onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

</body>
</html>
