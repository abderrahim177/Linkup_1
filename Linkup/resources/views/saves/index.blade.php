@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto space-y-4">
    
    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-lg">
            <i class="fa-solid fa-bookmark"></i>
        </div>
        <div>
            <h2 class="font-bold text-gray-900 text-base">My Saved Posts</h2>
            <p class="text-xs text-gray-500">All the professional articles and posts you have saved.</p>
        </div>
    </div>

    @forelse($posts as $post)
    <div x-data="{ open: false, isCommentsOpen: false }" class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 space-y-3 relative">
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
                    <p class="text-xs text-gray-500 font-medium">{{ $post->user->headline ?? 'Membre / Professionnel' }}</p>
                </div>
            </div>
        </div>

        <div class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
            {{ $post->content }}
        </div>

        <div class="flex items-center justify-between border-t border-gray-100 pt-2 text-xs font-semibold text-gray-500">
            <form action="{{ route('posts.like', $post->id) }}" method="POST" class="flex-1">
                @csrf
                @php $isLiked = $post->isLikedByUser(Auth::id()); @endphp
                <button type="submit" class="w-full flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg text-xs font-semibold {{ $isLiked ? 'text-blue-600' : '' }}">
                    <i class="{{ $isLiked ? 'fa-solid' : 'fa-regular' }} fa-thumbs-up"></i> Like
                </button>
            </form>

            <form action="{{ route('save', $post->id) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg text-blue-600 font-bold">
                    <i class="fa-solid fa-bookmark"></i> Saved
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white border border-gray-200 rounded-xl p-12 text-center text-gray-500 shadow-sm">
        <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
            <i class="fa-regular fa-bookmark text-xl text-gray-400"></i>
        </div>
        <h4 class="text-sm font-bold text-gray-800 mb-1">No saved posts yet</h4>
        <p class="text-xs text-gray-400">Click the "Save" button on any post to keep it here.</p>
    </div>
    @endforelse

</div>
@endsection