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
<body class="h-full" style="background-image: url('{{ asset('images/header/header.png') }}');background-size:cover;">
    <div class="container flex justify-center h-[100vh] pt-5">
        <div class="flex h-[600px] w-[700px] bg-white flex-col justify-center px-6 py-8 lg:px-8 rounded-lg shadow-md">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm mb-4">
            <div class="logo flex justify-center select-none cursor-pointer">
              <img src="{{ asset('images/icons/logo.png') }}" class="w-5 h-5 my-auto me-1" alt="">
              <h1 class="text-2xl font-semibold">Book<span class="text-primary">Nest.</span></h1>
            </div>
            <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mt-2">Sign up to your account</h2>
          </div>
          @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md">
              <ul class="list-disc list-inside">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
          <form class="space-y-6" action="/register" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <!-- Kolom Kiri -->
              <div>
                <label for="nik" class="block text-sm font-medium text-gray-900">NIK</label>
                <input type="text" name="nik" id="nik" required class="mt-2 block h-12 border-2 w-full rounded-md px-3 py-1.5 text-base text-gray-900 focus:outline-primary">
              </div>
      
              <!-- Kolom Kiri -->
              <div>
                <label for="name" class="block text-sm font-medium text-gray-900">Nama Lengkap</label>
                <input type="text" name="name" id="name" required class="mt-2 block h-12 border-2 w-full rounded-md px-3 py-1.5 text-base text-gray-900 focus:outline-primary">
              </div>
              <!-- Kolom Kanan -->
              <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" required class="mt-2 block h-12 border-2 w-full rounded-md px-3 py-1.5 text-base text-gray-900 focus:outline-primary">
              </div>
      
              <!-- Kolom Kanan -->
              <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" required class="mt-2 block h-12 border-2 w-full rounded-md px-3 py-1.5 text-base text-gray-900 focus:outline-primary">
              </div>
              
              <!-- Kolom Kanan -->
              <div>
                <label for="retype_password" class="block text-sm font-medium text-gray-900">Retype Password</label>
                <input type="password" name="password_confirmation" id="retype_password" required class="mt-2 block h-12 border-2 w-full rounded-md px-3 py-1.5 text-base text-gray-900 focus:outline-primary">
              </div>
            </div>
      
            <div class="pt-2">
              <button type="submit" class="flex w-full justify-center rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-light transition">Sign up</button>
            </div>
          </form>
      
          <p class="text-center text-sm text-gray-500 mt-4">
            Sudah punya akun?
            <a href="/login" class="font-semibold text-primary hover:text-primary-light">Sign in di sini</a>
          </p>
        </div>
      </div>
      
    </div>

</body>
</html> 