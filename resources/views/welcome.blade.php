    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laipni lūgti mūsu viesnīcā</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-color: white;
                color: black;
                font-family: sans-serif;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
            a {
                color: black;
                text-decoration: none;
            }
            a:hover {
                color: rgb(255, 132, 39);
            }
            .navigation-links {
                margin-top: 20px;
            }
            .navigation-links a {
                transition: color 0.3s;
                margin: 0 10px;
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 16px;
                font-weight: bold;
            }
            .navigation-links a:hover {
                color:  rgb(255, 132, 39;
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
    <header>
        <div class="container mx-auto flex justify-between items-center p-6">
            <!-- Navigation Links -->
            <div class="navigation-links">
                @if (Route::has('login'))
                    <div class="flex space-x-4">
                        @auth
                            <a href="{{ url('/home') }}" >Mājas</a>
                        @else
                            <a href="{{ route('login') }}">Ieiet</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Reģistrēties</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <main>
        <div class="text-center">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/019/480/433/small_2x/minimalist-book-icon-illustration-on-white-background-vector.jpg" alt="Hotel logo" class="mx-auto mb-4" />
            <h1 class="text-3xl font-bold">HotelBookingLV</h1>
            <p class="mt-4 text-lg">Reģistrējies / ienāc lai turpinātu saturu!</p>
        </div>
    </main>

    </body>
    </html>



