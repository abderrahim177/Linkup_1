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
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen font-[Poppins]">

    <header class="sticky top-0 z-50 bg-gray-800 border-b border-gray-700 shadow-md backdrop-blur-md bg-opacity-95">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            
            <div class="flex items-center gap-4 flex-1 max-w-md">
                <a href="/feed" class="text-indigo-500 font-bold text-2xl tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-circle-nodes"></i> Link<span class="text-white">Up</span>
                </a>
                <div class="relative w-full hidden md:block">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Rechercher un membre, un poste..." class="w-full bg-gray-700 text-sm text-white pl-10 pr-4 py-2 rounded-lg border border-transparent focus:border-indigo-500 focus:outline-none transition-all">
                </div>
            </div>

            <nav class="flex items-center gap-2 sm:gap-6 text-gray-400">
                <a href="/feed" class="flex flex-col items-center justify-center text-indigo-400 hover:text-indigo-400 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-house text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Accueil</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-400 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-users text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Réseau</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-400 transition-colors py-1 px-2 rounded-md relative">
                    <i class="fa-solid fa-briefcase text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Emplois</span>
                    <span class="absolute top-1 right-2 w-2 h-2 bg-indigo-500 rounded-full"></span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-400 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-comment-dots text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Messagerie</span>
                </a>
                
                <div class="h-8 w-[1px] bg-gray-700 mx-2 hidden sm:block"></div>
                
                <div class="flex items-center gap-2 cursor-pointer group">
                    <img src="https://ui-avatars.com/api/?name=Youssef+Alami&background=6366f1&color=fff" alt="Profile" class="w-8 h-8 rounded-full ring-2 ring-transparent group-hover:ring-indigo-500 transition-all">
                    <i class="fa-solid fa-chevron-down text-xs hidden sm:block group-hover:text-white transition-colors"></i>
                </div>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">
            
            <aside class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-lg sticky top-24">
                <div class="h-16 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                
                <div class="px-4 pb-4 text-center -mt-8 relative">
                    <img src="https://ui-avatars.com/api/?name=Youssef+Alami&background=6366f1&color=fff" alt="Avatar" class="w-16 h-16 rounded-full mx-auto border-4 border-gray-800 shadow-md mb-3">
                    <h3 class="font-semibold text-white text-base hover:underline cursor-pointer">Youssef Alami</h3>
                    <p class="text-xs text-indigo-400 font-medium mt-0.5">Développeur Fullstack</p>
                    <p class="text-[11px] text-gray-400 mt-1"><i class="fa-solid fa-building text-[10px] mr-1"></i> Freelance / Étudiant</p>
                </div>

                <div class="border-t border-gray-700 px-4 py-3 text-xs text-gray-400 flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <span>Vues du profil</span>
                        <span class="text-indigo-400 font-semibold">142</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Impressions du post</span>
                        <span class="text-indigo-400 font-semibold">1,054</span>
                    </div>
                </div>

                <div class="border-t border-gray-700 px-4 py-3 text-xs font-medium text-indigo-400 bg-gray-750/50 hover:bg-gray-700 transition-colors cursor-pointer text-center">
                    <i class="fa-solid fa-bookmark mr-1.5"></i> Éléments enregistrés
                </div>
            </aside>

            <div class="col-span-1 lg:col-span-3 grid grid-cols-1 gap-6">
                @yield('content')
            </div>

        </div>
    </main>

</body>
</html>