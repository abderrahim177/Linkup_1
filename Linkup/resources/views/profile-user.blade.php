@extends('layouts.master')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        <div class="lg:col-span-2 space-y-4">
            <!-- Ila knti khdam b Font Awesome 6 (Solid) -->
            <a href="javascript:history.back()"
                class="group inline-flex items-center gap-3 px-4 py-2 text-sm font-semibold text-gray-700 hover:text-indigo-600 transition-all duration-300 ease-in-out">

                <!-- Icon Font Awesome m3a Micro-animation -->
                <i class="fa-solid fa-angles-left text-base transform group-hover:-translate-x-1 transition-transform duration-300 ease-out"></i>
                <span class="tracking-wide">Retour</span>
            </a>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                        {{ auth()->user() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'U' }}
                    </div>
                    <button class="flex-1 bg-gray-50 hover:bg-gray-100 border border-gray-200 text-left rounded-full px-4 py-2.5 text-xs font-semibold text-gray-500 transition-colors cursor-pointer">
                        Start a post, share your professional thoughts...
                    </button>
                </div>

                <div class="flex items-center justify-between border-t border-gray-50 pt-2 text-xs font-semibold text-gray-500">
                    <button class="flex items-center gap-2 hover:bg-gray-50 px-3 py-2 rounded-lg transition-colors cursor-pointer text-blue-500">
                        <i class="fa-regular fa-image text-base"></i> <span>Media</span>
                    </button>
                    <button class="flex items-center gap-2 hover:bg-gray-50 px-3 py-2 rounded-lg transition-colors cursor-pointer text-green-500">
                        <i class="fa-regular fa-calendar-days text-base"></i> <span>Event</span>
                    </button>
                    <button class="flex items-center gap-2 hover:bg-gray-50 px-3 py-2 rounded-lg transition-colors cursor-pointer text-orange-500">
                        <i class="fa-regular fa-newspaper text-base"></i> <span>Write article</span>
                    </button>
                </div>
            </div>

            @forelse($posts as $post)
            <div x-data="{ isCommentsOpen: false }" class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 space-y-3 relative">

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                            {{ $post->user ? strtoupper(substr($post->user->name, 0, 1)) : 'A' }}
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <h4 class="font-bold text-gray-900 text-sm hover:text-blue-600 cursor-pointer transition-colors">
                                    <a href="{{ route('profile_user', $post->user->id) }}">{{ $post->user->name ?? 'Anonymous User' }}</a>
                                </h4>
                                @auth
                                @if(auth()->id() !== $post->user_id)
                                <span class="text-xs text-gray-300 font-bold">•</span>
                                <form action="{{ route('user.follow', $post->user->id) }}" method="POST" class="inline-flex items-center">
                                    @csrf
                                    @php $isFollowing = auth()->user()->isFollowing($post->user->id); @endphp
                                    <button type="submit" class="text-xs font-bold cursor-pointer transition-colors {{ $isFollowing ? 'text-gray-400 hover:text-gray-600' : 'text-blue-600 hover:text-blue-800' }}">
                                        {{ $isFollowing ? 'Following' : 'Follow' }}
                                    </button>
                                </form>
                                @endif
                                @endauth
                                <span class="text-xs text-gray-300 font-bold">•</span>
                                <p class="text-xs text-gray-400 shrink-0">
                                    {{ $post->created_at ? $post->created_at->diffForHumans() : 'Now' }}
                                </p>
                            </div>
                            <p class="text-[11px] text-gray-500 font-medium leading-tight mt-0.5">{{ $post->user->headline ?? 'Professional Member' }}</p>
                        </div>
                    </div>
                </div>

                <p class="text-sm text-gray-700 break-words whitespace-pre-line">
                    {{ Str::limit($post->content, 150, '...') }}
                    @if(strlen($post->content) > 150)
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 font-semibold hover:underline ml-1">
                        Voir plus
                    </a>
                    @endif
                </p>

                <div class="flex items-center justify-between text-[11px] text-gray-400 font-medium border-b border-gray-100 pb-2">
                    <div class="flex items-center gap-1 hover:text-blue-600 cursor-pointer">
                        <span class="w-4 h-4 bg-blue-500 rounded-full flex items-center justify-center text-white text-[9px]"><i class="fa-solid fa-thumbs-up"></i></span>
                        <span>{{ $post->likes_count ?? 12 }} likes</span>
                    </div>
                    <div class="hover:text-blue-600 cursor-pointer" @click="isCommentsOpen = !isCommentsOpen">
                        <span>{{ $post->comments->count() }} comments</span>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 pt-1">
                    <button class="flex-1 flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-regular fa-thumbs-up text-base"></i> <span>Like</span>
                    </button>

                    <button class="flex-1 flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                        <i class="fa-solid fa-arrows-rotate text-base"></i>
                        <span class="cursor-pointer">14 reposts</span>
                    </button>
                    <button @click="isCommentsOpen = !isCommentsOpen"
                        class="flex-1 flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600"
                        :class="isCommentsOpen ? 'text-blue-600 bg-blue-50/50' : ''">
                        <i class="fa-regular fa-comment text-base"></i> <span>Comment</span>
                    </button>

                    @auth
                    @php $isSaved = $post->isSavedByUser(Auth::id()); @endphp
                    <form action="{{ route('save', $post->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer {{ $isSaved ? 'text-blue-600 font-bold' : '' }}">
                            <i class="{{ $isSaved ? 'fa-solid text-blue-600' : 'fa-regular' }} fa-bookmark text-base"></i>
                            <span>{{ $isSaved ? 'Saved' : 'Save' }}</span>
                        </button>
                    </form>
                    @endauth
                </div>


            </div>
            @empty
            <div class="bg-white border border-gray-200 rounded-xl p-12 text-center text-gray-400 shadow-sm">
                <i class="fa-solid fa-square-rss text-3xl text-gray-200 mb-2"></i>
                <p class="text-xs">No professional updates available right now.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection