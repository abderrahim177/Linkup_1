<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp - Connecter les Professionnels</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f3f4f6] text-gray-800 min-h-screen antialiased">

   <header class="sticky top-0 z-50 bg-white border-b border-gray-200">
    @if(Route::has('login'))
    <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

        <div class="flex items-center gap-4 flex-1 max-w-md">
            <a href="/feed" class="text-blue-600 font-bold text-2xl tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-circle-nodes"></i> Link<span class="text-gray-900">Up</span>
            </a>
            <div class="relative w-full hidden md:block">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Rechercher..." class="w-full bg-[#f3f4f6] text-sm text-gray-800 pl-10 pr-4 py-2 rounded-lg border border-transparent focus:border-blue-500 focus:bg-white focus:outline-none transition-all">
            </div>
        </div>

        <nav class="flex items-center gap-2 sm:gap-6 text-gray-500">
            
            @auth
                <a href="/feed" class="flex flex-col items-center justify-center text-blue-600 transition-colors py-1 px-2">
                    <i class="fa-solid fa-house text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Accueil</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-blue-600 transition-colors py-1 px-2">
                    <i class="fa-solid fa-users text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Réseau</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-blue-600 transition-colors py-1 px-2 relative">
                    <i class="fa-solid fa-briefcase text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Emplois</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-blue-600 transition-colors py-1 px-2">
                    <i class="fa-solid fa-comment-dots text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Messagerie</span>
                </a>

                <div class="h-8 w-[1px] bg-gray-200 mx-1 hidden sm:block"></div>

                <div class="flex items-center gap-2 cursor-pointer py-1 px-2">
                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Avatar" class="w-8 h-8 rounded-full object-cover">
                </div>

                <a href="/logout" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Déconnexion">
                    <i class="fa-solid fa-power-off text-lg"></i>
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors px-3 py-2">
                    Connexion
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors px-4 py-2 rounded-lg shadow-sm">
                        Inscription
                    </a>
                @endif
            @endguest

        </nav>
    </div>
    @endif
</header>

    <main class="max-w-6xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">

            <aside class="space-y-4 sticky top-22">
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                    <div class="h-16 bg-gradient-to-r from-emerald-500 to-teal-600 relative"></div>
                    
                    <div class="px-4 pb-4 text-center -mt-8 relative border-b border-gray-100">
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Avatar" class="w-16 h-16 rounded-full mx-auto border-4 border-white object-cover shadow-sm">
                        <h3 class="font-bold text-gray-900 text-base mt-2">Youssef Alami</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Développeur Fullstack PHP / Laravel</p>
                    </div>

                    <div class="p-4 text-xs space-y-3 border-b border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 font-medium">Profile viewers</span>
                            <span class="text-gray-900 font-bold flex items-center gap-1">142 <span class="text-emerald-500 text-[10px]"><i class="fa-solid fa-caret-up"></i> 12%</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 font-medium">Post impressions</span>
                            <span class="text-gray-900 font-bold flex items-center gap-1">1,054 <span class="text-emerald-500 text-[10px]"><i class="fa-solid fa-caret-up"></i> 38%</span></span>
                        </div>
                    </div>

                    <div class="p-2 text-xs font-semibold text-gray-600 space-y-1">
                        <a href="#" class="flex items-center gap-2.5 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                            <i class="fa-solid fa-bookmark text-gray-400 w-4"></i> Saved items
                        </a>
                        <a href="#" class="flex items-center gap-2.5 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                            <i class="fa-solid fa-users text-gray-400 w-4"></i> Groups
                        </a>
                        <a href="#" class="flex items-center gap-2.5 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                            <i class="fa-solid fa-newspaper text-gray-400 w-4"></i> Newsletters
                        </a>
                    </div>
                </div>
            </aside>

            <div class="col-span-1 lg:col-span-3">
                @yield('content')
            </div>

        </div>
    </main>
</body>

</html>