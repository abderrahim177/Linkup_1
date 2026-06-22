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
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen font-[Poppins]">

    <header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm backdrop-blur-md bg-opacity-95">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

            <div class="flex items-center gap-4 flex-1 max-w-md">
                <a href="/feed" class="text-indigo-600 font-bold text-2xl tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-circle-nodes"></i> Link<span class="text-gray-900">Up</span>
                </a>
                <div class="relative w-full hidden md:block">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Rechercher un membre, un poste..." class="w-full bg-gray-100 text-sm text-gray-800 pl-10 pr-4 py-2 rounded-lg border border-transparent focus:border-indigo-500 focus:bg-white focus:outline-none transition-all">
                </div>
            </div>

            <nav class="flex items-center gap-2 sm:gap-6 text-gray-500">
                <a href="/feed" class="flex flex-col items-center justify-center text-indigo-600 hover:text-indigo-600 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-house text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Accueil</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-600 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-users text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Réseau</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-600 transition-colors py-1 px-2 rounded-md relative">
                    <i class="fa-solid fa-briefcase text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Emplois</span>
                    <span class="absolute top-1 right-2 w-2 h-2 bg-indigo-600 rounded-full"></span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center hover:text-indigo-600 transition-colors py-1 px-2 rounded-md">
                    <i class="fa-solid fa-comment-dots text-xl"></i>
                    <span class="text-[10px] font-medium mt-1 hidden sm:block">Messagerie</span>
                </a>

                <div class="h-8 w-[1px] bg-gray-200 mx-2 hidden sm:block"></div>

                <div class="flex items-center gap-2 cursor-pointer group">
                <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                    alt="Avatar"
                    class="w-10 h-10 rounded-full border border-gray-200 object-cover">                    
                    <i class="fa-solid fa-chevron-down text-xs hidden sm:block group-hover:text-gray-900 transition-colors"></i>
                </div>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">

            <aside class="bg-white border border-gray-150 rounded-2xl overflow-hidden shadow-sm sticky top-24 transition-all duration-300 hover:shadow-md group">
                <div class="h-20 bg-black opacity-90 relative"></div>

                <div class="px-5 pb-5 text-center -mt-10 relative border-b border-gray-100">
                    <div class="inline-block relative">
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                            alt="Avatar"
                            class="w-20 h-20 rounded-full mx-auto border-4 border-white shadow-sm object-cover transition-transform duration-300 group-hover:scale-105">
                        <span class="absolute bottom-1 right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full" title="En ligne"></span>
                    </div>

                    <h3 class="font-semibold text-gray-900 text-base mt-3 hover:text-indigo-600 transition-colors cursor-pointer flex items-center justify-center gap-1">
                        Youssef Alami
                        <i class="fa-solid fa-circle-check text-indigo-500 text-xs" title="Profil Vérifié"></i>
                    </h3>
                    <p class="text-xs text-indigo-600 font-semibold tracking-wide uppercase mt-0.5">Développeur Fullstack</p>

                    <div class="flex items-center justify-center gap-2 mt-3 text-[11px] text-gray-500 bg-gray-50 py-1.5 px-3 rounded-full inline-flex">
                        <i class="fa-solid fa-building text-gray-400"></i>
                        <span class="font-medium">Freelance / Étudiant</span>
                    </div>
                </div>

                <div class="px-5 py-4 text-xs flex flex-col gap-3 border-b border-gray-100 bg-gray-50/30">
                    <div class="flex justify-between items-center group/item cursor-pointer">
                        <span class="text-gray-500 group-hover/item:text-gray-900 transition-colors">Vues du profil</span>
                        <span class="bg-indigo-50 text-indigo-600 font-bold px-2 py-0.5 rounded-md text-[11px]">142</span>
                    </div>
                    <div class="flex justify-between items-center group/item cursor-pointer">
                        <span class="text-gray-500 group-hover/item:text-gray-900 transition-colors">Impressions du post</span>
                        <span class="bg-indigo-50 text-indigo-600 font-bold px-2 py-0.5 rounded-md text-[11px]">1,054</span>
                    </div>
                </div>

                <div class="px-5 py-3.5 text-xs font-semibold text-gray-600 hover:text-indigo-600 hover:bg-indigo-50/50 transition-all duration-200 cursor-pointer flex items-center justify-center gap-2">
                    <i class="fa-regular fa-bookmark text-sm text-gray-400 group-hover:text-indigo-600"></i>
                    <span>Éléments enregistrés</span>
                </div>
            </aside>
            <div class="col-span-1 lg:col-span-3 grid grid-cols-1 gap-6">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>