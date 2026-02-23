<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>ダッシュボード</title>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8">
        <h1 class="text-3xl font-light tracking-tight text-[#1a1a1a] mb-6">ダッシュボード</h1>
        <p class="text-lg text-gray-700 font-light mb-8">ようこそ、{{ Auth::user()->name }} さん</p>
        <form action="{{ route('login.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full py-4 bg-[#1a1a1a] text-white rounded-xl font-bold text-sm shadow-lg hover:bg-black hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-2">
                <span>ログアウト</span>
                <i class="fa-solid fa-sign-out-alt"></i>
            </button>
        </form>
    </div>
</body>
</html>
