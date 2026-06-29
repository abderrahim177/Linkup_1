<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="min-h-screen bg-slate-50 flex items-center justify-center p-4 antialiased selection:bg-indigo-500 selection:text-white">
        <div class="w-full max-w-md bg-white border border-gray-100 rounded-2xl shadow-xl shadow-slate-100/80 p-8 relative overflow-hidden">

            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 to-violet-600"></div>

            <div class="mb-6 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 text-xl mb-4">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Créer un compte</h2>
                <p class="text-sm text-gray-500 mt-1.5">Rejoignez la communauté dès aujourd'hui</p>
            </div>

            <form action="{{route('save.user')}}" method="POST" class="space-y-4">
                <!-- Nom complet -->
                @csrf
                @method('POST')
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Nom complet</label>
                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input name="name" value="{{old('name')}}" type="text"  placeholder="Youssef Alami"
                            class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200">
                    </div>
                    @error('name')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-red-600 font-medium animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- Headline (Titre professionnel) -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Headline (Titre professionnel)</label>
                    <div class="relative">
                        <i class="fa-solid fa-briefcase absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input name="headline" value="{{old('headline')}}" type="text"  placeholder="Ex: Développeur Full-Stack / Admin Système" class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200">
                    </div>
                    @error('headline')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-red-600 font-medium animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Adresse Email</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input name="email" value="{{old('email')}}" type="email"  placeholder="youssef@exemple.com"
                            class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200">
                    </div>
                    @error('email')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-red-600 font-medium animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Mot de passe</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input name="password" value="{{old('password')}}" type="password"  placeholder="••••••••"
                            class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-2.5 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200">
                    </div>
                    @error('password')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-red-600 font-medium animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <!-- Bouton Inscription -->
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm py-3 rounded-xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-indigo-600/20 mt-2">
                    Créer mon compte
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 pt-5 border-t border-gray-100 text-center text-sm text-gray-500">
                Déjà inscrit ?
                <a href="{{route('login')}}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition-colors ml-1">Se connecter</a>
            </div>
        </div>
    </div>
</body>

</html>