<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite("resources/css/home.css")   
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">My<span>Blog</span></a>
                <div class="nav-links">
                    <a href="{{route('home')}}" class="active">Home</a>
                    
                    @if (Route::has('login'))
                    @auth
                        <a
                            href="{{route('dashboard')}}"
                        >
                            Dashboard
                        </a>
                    @else
                    <a href="{{route('login')}}">Login</a>
                    @endauth

                    @endif
                </div>
            </nav>
        </div>
    </header>

    {{ $slot }}

     <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About MyBlog</h3>
                    <p>A blog dedicated to Laravel, PHP, and modern web development practices. We share tutorials, tips, and industry insights.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        
                    </ul>
                </div>
                
            </div>
            <div class="copyright">
                <p>&copy; 2023 LaraBlog. All rights reserved. Built with Laravel.</p>
            </div>
        </div>
    </footer>
</body>
</html>