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

        <div class="mb-8 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 text-xl mb-4">
                <i class="fa-solid fa-circle-nodes"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Ravi de vous revoir</h2>
            <p class="text-sm text-gray-500 mt-1.5">Accédez à votre tableau de bord LinkUp</p>
        </div>

        <form action="{{ route('check_user') }}" method="POST" class="space-y-5">
            <!-- Email -->
             @csrf
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Adresse Email</label>
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="email" name="email" value="{{old('email')}}"  placeholder="nom@exemple.com" 
                    class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-3 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200 shadow-inner shadow-sm">
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
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider">Mot de passe</label>
                    <a href="#" class="text-xs font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Mot de passe oublié ?</a>
                </div>
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="password" name="password" value="{{old('password')}}"  placeholder="••••••••" 
                        class="w-full bg-gray-50/50 text-sm text-gray-800 pl-10 pr-4 py-3 rounded-xl border border-gray-200/80 focus:border-indigo-500 focus:bg-white focus:outline-none transition-all duration-200">
                </div>
                @error('password')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-red-600 font-medium animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-[11px]"></i>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Se souvenir de moi -->
            <div class="flex items-center">
                <input id="remember" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 cursor-pointer">
                <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">Rester connecté</label>
            </div>

            <!-- Bouton Connexion -->
            <button type="submit" 
                class="w-full bg-gray-900 hover:bg-indigo-600 text-white font-medium text-sm py-3 rounded-xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-gray-900/10 hover:shadow-indigo-600/20">
                Se connecter
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 pt-6 border-t border-gray-100 text-center text-sm text-gray-500">
            Nouveau sur la plateforme ? 
            <a href="{{route('register')}}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition-colors ml-1">Créer un compte</a>
        </div>
    </div>
</div>
</body>
</html>
