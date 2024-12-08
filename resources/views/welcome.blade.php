
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        h1{
            color: rgb(20, 170, 20)
        }
        a{
            color: white
        }
    </style>
</head>
<body>
    <h1>Student PlatForm for exchane Skills</h1>
    @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <button type="button" class="btn btn-primary">
                        <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
                    </button>
                    

                    @if (Route::has('register'))
                        <button type="button" class="btn btn-success">
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        </button>
                    @endif
                @endauth
            </nav>
    @endif

    <script src="{{ asset('js/test.js') }}"></script></body>
</html>

                        
