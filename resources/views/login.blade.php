<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="h-full">
    <div class="container bg-blue-400 h-[100vh] flex justify-center items-center" style="background-image: url('{{ asset('images/header/header.png') }}');background-size:cover;">

    <div class="flex h-[80vh] w-96 bg-white flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="logo flex justify-center select-none cursor-pointer">
                <img src="{{ asset('images/icons/logo.png') }}" class="w-5 h-5 my-auto me-1" alt="">
                <h1 class="text-2xl font-semibold">Book<span class="text-primary">Nest.</span></h1>
            </div>
          <h2 class=" text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>
        @if (session('success'))
        <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
            {{-- {{ "Register Berhasil" }} --}}
        </div>
        @endif

        @if (session('error'))
        <div class="mt-4 p-3 bg-red-100 text-red-500 rounded-md">
            {{ session('error')}}
            {{-- {{ "Register Berhasil" }} --}}
        </div>
        @endif
    
        <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-1" action="/login" method="POST">
            @csrf
            <div>
              <label for="nis" class="block text-sm/6 font-medium text-gray-900">Nomor Induk Sekolah</label>
              <div class="mt-2">
                <input type="text" name="nis" id="nis" autocomplete="nis" required class="block h-13 border-2 w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                  <a href="#" class="font-semibold text-primary hover:text-primary-light">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 h-13 border-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex mt-5 w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-primary-light transition-all duration-300 ease-in-out focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Sign in</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            Not a member?
            <a href="/register" class="font-semibold text-primary hover:text-primary-light">Sign Up Here</a>
          </p>
        </div>
      </div>
    </div>

</body>
</html> 