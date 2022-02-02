<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Store - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body {
        background-color: WhiteSmoke;
    }   
</style>
</head>
<body class="d-flex flex-column" style="min-height: 100vh">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color: #ffff;">Learning Management System</a>
            <div class="d-flex">
                <div class="navbar-nav me-auto mb-2 mb-lg-1 f-flex flex-row">
                    @auth
                        @if (Auth::user()->user_role === 'admin')
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffff;">Manage</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/insert-category">Category</a></li>
                                    <li><a class="dropdown-item" href="/insert-course">Course</a></li>
                                    <li><a class="dropdown-item" href="/view-user">User</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffff;">Hello, {{ Auth::user()->user_name }}</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        @elseif (Auth::user()->user_role === 'member')
                            <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/course" style="color: #ffff;">Courses</a></li>
                                <li class="nav-item"><a class="nav-link" href="/cart" style="color: #ffff;">View Cart</a></li>
                                <li class="nav-item"><a class="nav-link" href="/transaction-history" style="color: #ffff;">View Transaction History</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffff;">Hello, {{ Auth::user()->user_name }}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item col-8"><a class="nav-link" href="/register" style="color: #ffff;">Register</a></li>
                            <li class="nav-item col"><a class="nav-link" href="/login" style="color: #ffff;">Login</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    @yield('body')

    <footer class="bg-primary text-lg-start p-3 align-items-center mt-auto">
        <div class="row">
            <div class="col-4">
                <span style="color: #ffff;">Current date and time: {{ Carbon\Carbon::now()->isoFormat('ddd, MMMM D, YYYY h:mm A') }}</span>
            </div>
            <div class="col-4 text-center">
                <span style="color: #ffff;">Copyright &copy; 2021 Learning Management System</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
