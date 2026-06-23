@extends('layouts.master')

@section('content')
<div class="bg-white border border-gray-250 rounded-xl p-4 shadow-sm flex flex-col gap-3">
    <div class="flex items-center gap-3">
        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
            alt="Avatar"
            class="w-13 h-13 rounded-full mx-auto border-4 border-white shadow-sm object-cover transition-transform duration-300 group-hover:scale-105"> <button class="flex-1 bg-gray-100 border border-gray-200 hover:bg-gray-150 text-left text-gray-500 text-sm py-2.5 px-4 rounded-full transition-colors cursor-pointer font-medium">
            Commencer un post, partager une idée...
        </button>
    </div>
    <div class="flex items-center justify-between border-t border-gray-100 pt-2 text-xs font-semibold text-gray-500">
        <button class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-blue-600">
            <i class="fa-regular fa-image text-lg"></i> Média
        </button>
        <button class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-amber-600">
            <i class="fa-regular fa-calendar-days text-lg"></i> Événement
        </button>
        <button class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-emerald-600">
            <i class="fa-solid fa-newspaper text-lg"></i> Rédiger un article
        </button>
    </div>
</div>

<div class="space-y-4">

    <div class="bg-white border border-gray-250 rounded-xl shadow-sm p-4 transition-all hover:border-gray-300">

        <div class="flex items-start justify-between">
            <div class="flex items-center gap-3">
                <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                    alt="Avatar"
                    class="w-14 h-14 rounded-full border border-gray-200 object-cover">
                <div>
                    <h4 class="font-semibold text-gray-900 text-sm hover:text-indigo-600 hover:underline cursor-pointer transition-colors">
                        Youssef Alami
                    </h4>
                    <p class="text-xs text-indigo-600 font-medium max-w-sm line-clamp-1">
                        Développeur Fullstack PHP / Laravel
                    </p>

                    <p class="text-[10px] text-gray-500 flex items-center gap-1 mt-0.5">
                        <i class="fa-solid fa-building text-[9px]"></i> Freelance
                    </p>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        <i class="fa-regular fa-clock mr-1"></i>Il y a 2 heures
                    </p>
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-750 leading-relaxed whitespace-pre-line py-2.5 border-b border-gray-150">Ravi de partager avec vous le lancement de notre nouvelle application LinkUp ! 
            Il s'agit d'une plateforme moderne développée avec Laravel, mettant en œuvre une architecture robuste et des relations Eloquent optimisées pour gérer efficacement le fil d'actualité.
            Un grand merci à toute l'équipe pour les efforts fournis durant cette première semaine de développement.
            Stay tuned pour la suite ! </div>
        <div class="flex items-center justify-between pt-2 text-xs font-semibold text-gray-500">
            <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-600">
                <i class="fa-regular fa-thumbs-up text-base"></i> J'aime
            </button>
            <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-600">
                <i class="fa-regular fa-comment text-base"></i> Commenter
            </button>
            <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-600">
                <i class="fa-solid fa-share text-base"></i> Partager
            </button>
        </div>
    </div>
    <div class="max-w-5xl mx-auto px-4 py-10 font-sans antialiased bg-gray-50/50 min-h-screen">
    
    <div class="mb-10 text-center md:text-left">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-2">Fil d'actualités</h2>
        <p class="text-gray-500 text-sm">Découvrez les dernières publications de notre communauté.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-blue-50 text-blue-600 text-[11px] font-bold tracking-wide uppercase px-2.5 py-1 rounded-md">
                            Article
                        </span>
                        <span class="text-xs text-gray-400">
                            {{ $post->created_at ? $post->created_at->format('d M Y') : 'Récemment' }}
                        </span>
                    </div>

                    <p class="text-gray-700 text-sm font-medium leading-relaxed mb-6 line-clamp-4">
                        {{ $post->content }}
                    </p>
                </div>

                <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                            {{ $post->user ? strtoupper(substr($post->user->name, 0, 1)) : 'A' }}
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-800">
                                {{ $post->user->name ?? 'Auteur anonyme' }}
                            </h4>
                            <p class="text-[10px] text-gray-400">
                                {{ $post->user->headline ?? 'Membre' }}
                            </p>
                        </div>
                    </div>

                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fa-regular fa-bookmark text-sm"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white border border-gray-100 rounded-2xl p-12 text-center text-gray-500 max-w-md mx-auto w-full shadow-sm">
                <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-regular fa-folder-open text-2xl text-gray-400"></i>
                </div>
                <h4 class="text-base font-bold text-gray-800 mb-1">Aucun post disponible</h4>
                <p class="text-xs text-gray-400 mb-5">La base de données ne contient aucun article pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection