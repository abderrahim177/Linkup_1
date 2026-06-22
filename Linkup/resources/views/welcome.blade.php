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
                <img src="https://ui-avatars.com/api/?name=Youssef+Alami&background=4f46e5&color=fff"
                    alt="Youssef Alami"
                    class="w-11 h-11 rounded-full border border-gray-200 object-cover">
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

    <div class="bg-white border border-gray-250 rounded-xl p-8 text-center text-gray-500">
        <i class="fa-regular fa-folder-open text-4xl mb-3 text-gray-300"></i>
        <p class="text-sm">Aucun post disponible pour le moment. Soyez le premier à publier !</p>
    </div>

</div>
@endsection