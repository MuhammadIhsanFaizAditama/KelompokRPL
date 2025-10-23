<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduBridge</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-cover bg-center" 
      style="background-image: url('images/loginbg.jpg');">    
            
      <div class="absolute inset-0 bg-black opacity-10"></div>

      <div class="w-full max-w-md bg-[#000006] rounded-lg shadow-lg p-5 opacity-80">
        <h2 class="text-3xl font-bold text-center text-white mb-1 flex items-center justify-center gap-0">
            <img src="{{ asset('images/logo.png') }}" alt="Logo EduBridge" class="w-25 h-auto">
            <span>Login <span class="text-blue-500">EduBridge</span></span>
        </h2>
        
        @if (session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
                <strong class="font-bold">Login gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-100 mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="email@contoh.com"
                    class="w-full px-4 py-2 bg-white text-black border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password -->
            <div class="mb-6 relative">
                <label for="password" class="block text-gray-100 mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                    class="w-full px-4 py-2 bg-white text-black border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">

                <!-- Toggle Password Eye Icon -->
                <span id="togglePassword" class="absolute right-3 top-10 cursor-pointer text-gray-500">
                    <!-- Eye Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
            </div>

            <button type="submit" class="w-full font-semibold bg-blue-700 text-white py-2 rounded shadow hover:bg-blue-500 transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-100 mt-5">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
        </p>
    </div>

    <!-- Script Toggle Password dengan warna ikon -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        let visible = false;

        togglePassword.addEventListener('click', () => {
            visible = !visible;
            password.type = visible ? 'text' : 'password';

            // warna ikon sesuai toggle
            const color = visible ? 'text-blue-600' : 'text-gray-500';

            // update ikon Eye / Eye-Slash
            togglePassword.innerHTML = visible ? `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ${color}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Eye-Slash Icon -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.969 9.969 0 012.364-3.527m1.704-1.727A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.053 10.053 0 01-4.855 5.799M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                </svg>` 
                : `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ${color}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Eye Icon -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>`;
        });
    </script>

</body>
</html>
