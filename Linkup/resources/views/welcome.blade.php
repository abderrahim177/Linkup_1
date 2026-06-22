@extends('layouts.master')

@section('content')

    <div class="bg-gray-800 border border-gray-700 rounded-xl p-4 shadow-lg flex flex-col gap-3">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=Youssef+Alami&background=6366f1&color=fff" alt="Avatar" class="w-10 h-10 rounded-full">
            <button class="flex-1 bg-gray-750 border border-gray-700 hover:bg-gray-700 text-left text-gray-400 text-sm py-2.5 px-4 rounded-full transition-colors cursor-pointer font-medium">
                Commencer un post, partager une idée...
            </button>
        </div>
        <div class="flex items-center justify-between border-t border-gray-750 pt-2 text-xs font-semibold text-gray-400">
            <button class="flex items-center gap-2 hover:bg-gray-750 py-2 px-3 rounded-lg transition-colors cursor-pointer text-blue-400">
                <i class="fa-regular fa-image text-lg"></i> Média
            </button>
            <button class="flex items-center gap-2 hover:bg-gray-750 py-2 px-3 rounded-lg transition-colors cursor-pointer text-amber-500">
                <i class="fa-regular fa-calendar-days text-lg"></i> Événement
            </button>
            <button class="flex items-center gap-2 hover:bg-gray-750 py-2 px-3 rounded-lg transition-colors cursor-pointer text-emerald-400">
                <i class="fa-solid fa-newspaper text-lg"></i> Rédiger un article
            </button>
        </div>
    </div>

    <div class="space-y-4">
        
            <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-4 transition-all hover:border-gray-600">
                
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <img src="" 
                             alt="" 
                             class="w-11 h-11 rounded-full border border-gray-700 object-cover">
                        <div>
                            <h4 class="font-semibold text-white text-sm hover:text-indigo-400 hover:underline cursor-pointer transition-colors">
                                
                            </h4>
                            <p class="text-xs text-indigo-400 font-medium max-w-sm line-clamp-1">
                               
                            </p>
                            
                                <p class="text-[10px] text-gray-400 flex items-center gap-1 mt-0.5">
                                    <i class="fa-solid fa-building text-[9px]"></i> 
                                </p>
                           
                            <p class="text-[10px] text-gray-500 mt-0.5">
                                <i class="fa-regular fa-clock mr-1"></i>
                            </p>
                        </div>
                    </div>
                    <button class="text-gray-500 hover:text-white p-1 rounded-full hover:bg-gray-700 transition-colors cursor-pointer">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>

                <div class="text-sm text-gray-200 leading-relaxed whitespace-pre-wrap py-2 border-b border-gray-750/50">
                   
                </div>

                <div class="flex items-center justify-between pt-2 text-xs font-semibold text-gray-400">
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-750 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-400">
                        <i class="fa-regular fa-thumbs-up text-base"></i> J'aime
                    </button>
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-750 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-400">
                        <i class="fa-regular fa-comment text-base"></i> Commenter
                    </button>
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-750 flex-1 py-2.5 rounded-lg transition-colors cursor-pointer hover:text-indigo-400">
                        <i class="fa-solid fa-share text-base"></i> Partager
                    </button>
                </div>

            </div>
      
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-8 text-center text-gray-400">
                <i class="fa-regular fa-folder-open text-4xl mb-3 text-gray-600"></i>
                <p class="text-sm">Aucun post disponible pour le moment. Soyez le premier à publier !</p>
            </div>
        
    </div>

@endsection