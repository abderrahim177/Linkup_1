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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <a href="/" class="text-blue-600 font-bold text-2xl tracking-wider flex items-center gap-2">
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
                    @if(auth()->user()->profile_image)
                    <img src="{{ asset('images/' . auth()->user()->profile_image) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover">
                    @else

                    <div class="relative inline-block">
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold uppercase select-none">
                            {{ Str::substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    @endif
                </div>

                <a href="{{ route('logout') }}" class="text-gray-400 hover:text-red-500 flex gap-2 items-center transition-colors p-2" title="Déconnexion">
                    <i class="fa-solid fa-power-off text-lg"></i>
                    <span>logout</span>
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
                    <div class="h-16 relative bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80');">
                    </div>

                    <div x-data="{ openModal: false }" class="px-4 pb-4 text-center -mt-8 relative border-b border-gray-100">

                        <div class="relative w-8 h-8 mx-auto group">
                            @if(auth()->user()?->profile_image)
                            <img src="{{ asset('images/' . auth()->user()->profile_image) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover">
                            @else
                            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold uppercase select-none">
                                {{ Str::substr(auth()->user()->name, 0, 1) }}
                            </div>
                            @endif

                            <button @click="openModal = true" type="button" class="absolute -bottom-1 -right-1 bg-white border border-gray-200 shadow-sm text-gray-500 hover:text-blue-600 p-1 rounded-full cursor-pointer transition-colors flex items-center justify-center">
                                <i class="fa-solid fa-pen text-[9px]"></i>
                            </button>
                        </div>

                        <h3 class="font-bold text-gray-900 text-base mt-2">{{ auth()->user()->name }}</h3>
                        <p class="text-xs text-gray-500 mt-0.5">{{ auth()->user()->headline }}</p>

                        <!-- Zaydna x-teleport hna bach l-modal t-ffa b3id 3la l-aside structurellement o t-afficha l-fouq dyal kolchi -->
                        <template x-teleport="body">
                            <div x-show="openModal"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50 p-4"
                                style="display: none;">

                                <div @click.away="openModal = false" class="bg-white rounded-2xl max-w-sm w-full p-6 text-left shadow-xl relative">
                                    <h3 class="text-base font-bold text-gray-900 mb-4">Modifier la photo de profil</h3>

                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <div class="mb-5">
                                            <label class="block text-xs font-semibold text-gray-500 mb-2">Choisir une image</label>
                                            <input type="file" name="profile_image" accept="image/*" required
                                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                        </div>

                                        <div class="flex justify-end gap-2 text-xs">
                                            <button @click="openModal = false" type="button" class="px-4 py-2 font-semibold text-gray-600 hover:bg-gray-50 rounded-lg">
                                                Annuler
                                            </button>
                                            <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm">
                                                Enregistrer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </template>

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
                        <a href="{{ route('saved.index') }}" class="flex items-center justify-between px-3 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 rounded-xl transition-colors w-full">
                            <div class="flex items-center  gap-3">
                                <i class="fa-solid fa-bookmark text-blue-600"></i>
                                <span>Saved Posts</span>
                            </div>

                            @auth
                            @if(auth()->user()->savedPosts()->count() > 0)
                            <span class="flex items-center justify-center bg-blue-100 text-blue-600 text-xs font-bold px-2 py-0.5 rounded-full min-w-[20px] h-5">
                                {{ auth()->user()->savedPosts()->count() }}
                            </span>
                            @endif
                            @endauth
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