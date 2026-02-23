<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="text-gray-800 min-h-screen flex items-center justify-center p-4 selection:bg-gray-200">

    <!-- Main Container -->
    <main class="w-full max-w-md animate-fade-in relative">

        <!-- Header Area -->
        <header class="mb-8 px-2 text-center">
            <div>
                <p class="text-xs font-bold tracking-widest text-gray-400 uppercase mb-1">LOGIN</p>
                <h1 class="text-3xl font-light tracking-tight text-[#1a1a1a]">ログイン</h1>
            </div>
        </header>

        <!-- Login Form -->
        <form action="{{ route('login.index') }}" method="post" class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 animate-slide-up">
            @csrf
            @error('login')
                <div class="mb-6">
                    <div class="bg-red-100 text-red-600 text-sm rounded-lg px-4 py-3 flex items-center gap-2" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                </div>
            </div>
            @enderror

            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-xs font-bold tracking-widest uppercase mb-2 flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-envelope"></i>
                    Email
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" id="email"
                           class="block w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] focus:ring-2 focus:ring-gray-100 text-lg font-light transition-all"
                           placeholder="example@email.com"
                           autofocus
                           value="">
                </div>
                @error('email')
                    <p class="text-sm text-red-600 font-medium mt-1 mb-6">
                        {{ $message }}
                    </p>
                @enderror
        </div>

            <!-- Password Input -->
            <div class="mb-8">
                <label for="password" class="block text-xs font-bold tracking-widest uppercase mb-2 flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-lock"></i>
                    Password
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" id="password"
                           class="block w-full pl-12 pr-12 py-3 border-2 border-gray-200 rounded-xl text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] focus:ring-2 focus:ring-gray-100 text-lg font-light transition-all"
                           placeholder="パスワードを入力">
                    <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fa-regular fa-eye" id="eye-icon"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 font-medium mt-1 mb-6">
                        {{ $message }}
                    </p>
                @enderror
        </div>

            <!-- Remember Me & Forgot Password -->
            <div class="mb-8 flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 text-[#1a1a1a] border-gray-300 rounded focus:ring-[#1a1a1a]">
                    <span>ログイン状態を保持</span>
                </label>
                <a href="#" class="text-gray-500 hover:text-[#1a1a1a] transition-colors">
                    パスワードを忘れた方
                </a>
            </div>

            <!-- Error Message (Optional) -->
            <!--
            <div class="mb-6 px-4">
                <div class="bg-red-100 border border-red-200 text-red-800 text-sm rounded-lg px-4 py-3" role="alert">
                    <i class="fa-solid fa-circle-exclamation mr-2"></i>
                    メールアドレスまたはパスワードが正しくありません
                </div>
            </div>
            -->

            <!-- Login Button -->
            <button type="submit"
                    class="w-full py-4 bg-[#1a1a1a] text-white rounded-xl font-bold text-sm shadow-lg hover:bg-black hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-2">
                <span>ログイン</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    アカウントをお持ちでない方は
                    <a href="#" class="text-[#1a1a1a] font-medium hover:underline transition-colors">
                        新規登録
                    </a>
                </p>
            </div>

        </form>

    </main>

    <script>
        // パスワード表示/非表示の切り替え
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>

</body>

</html>

