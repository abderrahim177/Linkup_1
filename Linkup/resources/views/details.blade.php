@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto my-8 px-4">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
        
        <div class="p-6 flex items-center justify-between border-b border-gray-50">
            <div class="flex items-center gap-3">
                <div class="relative inline-block flex-shrink-0">
                    <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="{{ $post->user->name }}"
                         class="w-11 h-11 rounded-full object-cover ring-2 ring-gray-100">
                    <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-500 ring-2 ring-white"></span>
                </div>
                
                <div class="flex flex-col">
                    <span class="font-semibold text-gray-900 text-sm md:text-base hover:text-blue-600 cursor-pointer">
                        {{ $post->user->name }}
                    </span>
                    <span class="text-xs text-gray-500 leading-tight mt-0.5">
                        {{ $post->user->headline ?? 'Membre de la communauté' }}
                    </span>
                </div>
            </div>

            <div class="text-xs text-gray-400 flex items-center gap-1 bg-gray-50 px-2.5 py-1 rounded-full">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="p-6 space-y-4">
            @if(!empty($post->title))
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 tracking-tight leading-tight">
                    {{ $post->title }}
                </h1>
            @endif

            <p class="text-sm text-gray-700 break-words whitespace-pre-line">
                {{ Str::limit($post->content, 150, '...') }}
                @if(strlen($post->content) > 150)
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 font-semibold hover:underline ml-1">
                    Voir plus
                </a>
                @endif
            </p>

            @if(!empty($post->image))
                <div class="mt-4 rounded-xl overflow-hidden border border-gray-100 max-h-[450px]">
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         alt="Post attachment" 
                         class="w-full h-full object-cover">
                </div>
            @endif
        </div>

        <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-50 flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center gap-6">
                <button class="flex items-center gap-2 hover:text-blue-600 transition-colors group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757c1.246 0 2.25 1.004 2.25 2.25 0 .585-.224 1.12-.59 1.522l-6.417 7.03a1 1 0 01-1.48 0L6.107 13.772A2.247 2.247 0 015.5 12.25c0-1.246 1.004-2.25 2.25-2.25H12V3.5a1.5 1.5 0 013 0V10z"></path>
                    </svg>
                    <span class="font-medium">J'aime</span>
                </button>

                <button class="flex items-center gap-2 hover:text-blue-600 transition-colors group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="font-medium">Commenter</span>
                </button>
            </div>

            <a href="javascript:history.back()"
                class="group inline-flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-700 hover:text-indigo-600 transition-all duration-300 ease-in-out">

                <!-- Icon Font Awesome m3a Micro-animation -->
                <i class="fa-solid fa-angles-left text-base transform group-hover:-translate-x-1 transition-transform duration-300 ease-out"></i>
                <span class="tracking-wide">Retour</span>
            </a>
        </div>
    </div>
</div>
@endsection