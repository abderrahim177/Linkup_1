@extends('layouts.master')

@section('content')
<div x-data="{ openModal: false }" class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
    
    <div class="lg:col-span-2 space-y-4">
        
        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm space-y-3">
            <div class="flex items-center gap-3">
                <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Avatar" class="w-9 h-9 rounded-full object-cover"> 
                
                <button @click="openModal = true" class="flex-1 bg-gray-50 border border-gray-200 hover:bg-gray-100 text-left text-gray-400 text-sm py-2 px-4 rounded-full transition-colors cursor-pointer focus:outline-none">
                    Start a post...
                </button>
            </div>
            <div class="flex items-center justify-between border-t border-gray-100 pt-2 text-xs font-semibold text-gray-500">
                <button @click="openModal = true" class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-blue-500">
                    <i class="fa-regular fa-video text-base"></i> Video
                </button>
                <button @click="openModal = true" class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-amber-500">
                    <i class="fa-regular fa-image text-base"></i> Photo
                </button>
                <button @click="openModal = true" class="flex items-center gap-2 hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors cursor-pointer text-indigo-500">
                    <i class="fa-regular fa-pen-to-square text-base"></i> Write an article
                </button>
            </div>
        </div>

        <div class="flex items-center justify-end text-xs text-gray-500 gap-1 pr-1">
            <span>Sort by:</span>
            <button class="font-semibold text-gray-800 flex items-center gap-1 cursor-pointer">
                the newest <i class="fa-solid fa-chevron-down text-[10px]"></i>
            </button>
        </div>

        @forelse($posts as $post)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 space-y-3 transition-all hover:shadow-sm">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                            {{ $post->user ? strtoupper(substr($post->user->name, 0, 1)) : 'A' }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h4 class="font-bold text-gray-900 text-sm hover:text-blue-600 cursor-pointer transition-colors">
                                    {{ $post->user->name ?? 'Auteur anonyme' }}
                                </h4>
                                <span class="text-xs text-gray-400 font-normal">• {{ $post->created_at ? $post->created_at->diffForHumans() : '2h ago' }}</span>
                            </div>
                            <p class="text-xs text-gray-500 font-medium">
                                {{ $post->user->headline ?? 'Membre / Professionnel' }}
                            </p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700 font-semibold text-xs flex items-center gap-1 cursor-pointer">
                        <i class="fa-solid fa-plus text-[10px]"></i> Follow
                    </button>
                </div>

                <div class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $post->content }}
                </div>

                <div class="text-xs font-semibold text-blue-600 space-x-1">
                    <span>#Laravel</span> <span>#WebDev</span> <span>#BuildInPublic</span>
                </div>

                <div class="flex items-center justify-between text-xs text-gray-400 border-b border-gray-100 pb-2.5 pt-1">
                    <div class="flex items-center gap-1.5">
                        <div class="flex -space-x-1">
                            <span class="w-4 h-4 rounded-full bg-blue-500 text-white flex items-center justify-center text-[8px] border border-white"><i class="fa-solid fa-thumbs-up"></i></span>
                            <span class="w-4 h-4 rounded-full bg-red-500 text-white flex items-center justify-center text-[8px] border border-white"><i class="fa-solid fa-heart"></i></span>
                        </div>
                        <span class="hover:underline cursor-pointer">Garry and 1,200 others</span>
                    </div>
                    <div class="space-x-2">
                        <span class="hover:underline cursor-pointer">86 comments</span>
                        <span>•</span>
                        <span class="hover:underline cursor-pointer">14 reposts</span>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 pt-1">
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-regular fa-thumbs-up text-base"></i> Like
                    </button>
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-regular fa-comment text-base"></i> Comment
                    </button>
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-solid fa-arrows-rotate text-base"></i> Repost
                    </button>
                    <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-regular fa-paper-plane text-base"></i> Send
                    </button>
                </div>
            </div>
        @empty
            <div class="bg-white border border-gray-200 rounded-xl p-12 text-center text-gray-500 shadow-sm max-w-md mx-auto">
                <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                    <i class="fa-regular fa-folder-open text-xl text-gray-400"></i>
                </div>
                <h4 class="text-sm font-bold text-gray-800 mb-1">Aucun post disponible</h4>
                <p class="text-xs text-gray-400">La base de données ne contient aucun article pour le moment.</p>
            </div>
        @endforelse

    </div>

    <div class="hidden lg:block space-y-4">
        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold text-gray-900 text-sm">Top stories</h3>
                <i class="fa-solid fa-circle-info text-gray-400 text-xs"></i>
            </div>
            
            <div class="space-y-3">
                <div>
                    <h4 class="text-xs font-bold text-gray-900 line-clamp-2 hover:underline cursor-pointer">SpaceX IPO mints thousands of new millionaires</h4>
                    <p class="text-[10px] text-gray-400 mt-0.5">12 min ago • 11,071 readers</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 line-clamp-2 hover:underline cursor-pointer">DOJ approves Paramount's $110B deal</h4>
                    <p class="text-[10px] text-gray-400 mt-0.5">21 min ago • 4,004 readers</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 line-clamp-2 hover:underline cursor-pointer">OpenAI subpoenaed by state AGs</h4>
                    <p class="text-[10px] text-gray-400 mt-0.5">28 min ago • 1,222 readers</p>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-900 line-clamp-2 hover:underline cursor-pointer">Gen Z enters the boardroom. Not all are ready</h4>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 hour ago • 171 readers</p>
                </div>
            </div>

            <button class="w-full text-left text-xs font-bold text-gray-500 hover:text-gray-700 mt-4 flex items-center gap-1 cursor-pointer">
                Show more <i class="fa-solid fa-chevron-down text-[9px]"></i>
            </button>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm flex items-center justify-between gap-4">
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Your Network</p>
                <h4 class="text-xs font-bold text-gray-900 mt-0.5">Skip the cold apply</h4>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-2 px-4 rounded-full transition-colors cursor-pointer shrink-0">
                See who's hiring
            </button>
        </div>
    </div>

    <div x-show="openModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-start sm:items-center justify-center bg-gray-900/60 backdrop-blur-md p-4"
         style="display: none;">
        
        <div @click.away="openModal = false" 
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-8 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             class="bg-white rounded-xl max-w-xl w-full shadow-2xl overflow-hidden border border-gray-100 mt-10 sm:mt-0">
            
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Avatar" class="w-11 h-11 rounded-full object-cover">
                    <div>
                        <h3 class="text-sm font-bold text-gray-950 flex items-center gap-1.5">
                            {{ Auth::user()->name ?? 'Auteur' }}
                        </h3>
                        <p class="text-xs text-gray-500 font-medium">Post to Anyone</p>
                    </div>
                </div>
                <button @click="openModal = false" class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition p-1 cursor-pointer">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                
                <div class="px-6 py-4">
                    <textarea name="content" rows="6" required 
                        placeholder="What do you want to talk about?" 
                        class="w-full text-base text-gray-800 placeholder-gray-400 border-none resize-none focus:outline-none focus:ring-0 bg-transparent"></textarea>
                </div>

                <div class="px-6 py-2 flex items-center gap-2 text-gray-500">
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a photo">
                        <i class="fa-regular fa-image text-lg"></i>
                    </button>
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a video">
                        <i class="fa-regular fa-video text-lg"></i>
                    </button>
                    <button type="button" class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a document">
                        <i class="fa-regular fa-file-lines text-lg"></i>
                    </button>
                </div>

                <div class="flex justify-end items-center gap-3 px-6 py-3 border-t border-gray-100 bg-gray-50/50">
                    <button type="button" @click="openModal = false" class="px-4 py-1.5 text-sm font-semibold text-gray-500 hover:bg-gray-100 rounded-full transition cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-1.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-full shadow-sm transition disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection