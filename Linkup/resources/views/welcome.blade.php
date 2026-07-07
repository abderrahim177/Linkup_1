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
        <div x-data="{ open: false, isCommentsOpen: false }" class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 space-y-3 transition-all hover:shadow-sm relative">
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

                <div class="flex items-center gap-3 relative">
                    <button class="text-blue-600 hover:text-blue-700 font-semibold text-xs flex items-center gap-1 cursor-pointer">
                        <i class="fa-solid fa-plus text-[10px]"></i> Follow
                    </button>
                    @can('update', $post)
                    <button @click="open = !open" @click.away="open = false" class="text-gray-400 hover:text-gray-600 p-1.5 rounded-full hover:bg-gray-50 cursor-pointer transition-colors">
                        <i class="fa-solid fa-ellipsis-vertical text-sm"></i>
                    </button>
                    @endcan
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 top-8 w-40 bg-white border border-gray-100 rounded-xl shadow-xl z-50 py-1.5 overflow-hidden"
                        style="display: none;">

                        @can('update', $post)
                        <a id="edit" href="{{ route('posts.edit', $post->id) }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                            <i class="fa-regular fa-pen-to-square text-sm text-gray-400"></i> Update Post
                        </a>
                        @endcan

                        @can('update', $post)
                        <div class="border-b border-gray-100 my-1"></div>
                        @endcan

                        @can('delete', $post)
                        <form action="{{ route('delete', $post->id) }}" method="POST" id="delete-form-{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" id="btn_delete"
                                @click="
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'You won\'t be able to revert this!',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('delete-form-{{ $post->id }}').submit();
                                    }
                                })
                                "
                                class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 cursor-pointer transition-colors">
                                <i class="fa-regular fa-trash-can text-sm text-red-400"></i> Delete Post
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
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
                        <span class="w-4 h-4 rounded-full bg-blue-500 text-white flex items-center justify-center text-[8px] border border-white">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </span>
                    </div>

                    <span class="hover:underline cursor-pointer text-xs text-gray-500">
                        {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}
                    </span>
                </div>
                <div class="space-x-2">
                    <span @click="isCommentsOpen = !isCommentsOpen" class="hover:underline hover:text-blue-600 cursor-pointer font-medium text-gray-500">
                        {{ $post->comments->count() }} comments
                    </span>
                    <span>•</span>
                    <span class="hover:underline cursor-pointer">14 reposts</span>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs font-semibold text-gray-500 pt-1">
                @auth
                <form action="{{ route('posts.like', $post->id) }}" method="POST" class="flex-1">
                    @csrf
                    @php
                    $isLiked = $post->isLikedByUser(Auth::id());
                    @endphp

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer text-xs font-semibold {{ $isLiked ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
                        <i class="{{ $isLiked ? 'fa-solid fa-thumbs-up text-base' : 'fa-regular fa-thumbs-up text-base' }}"></i>
                        <span>{{ $isLiked ? 'Liked' : 'Like' }}</span>
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="flex-1 flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors text-xs font-semibold text-gray-500">
                    <i class="fa-regular fa-thumbs-up text-base"></i>
                    <span>Like</span>
                </a>
                @endauth
                <button @click="isCommentsOpen = !isCommentsOpen"
                    class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer font-semibold text-xs hover:text-blue-600"
                    :class="isCommentsOpen ? 'text-blue-600 bg-blue-50/50' : 'text-gray-500'">
                    <i class="fa-regular fa-comment text-base"></i> Comment
                </button>
                <button class="flex items-center justify-center gap-2 hover:bg-gray-50 flex-1 py-2 rounded-lg transition-colors cursor-pointer hover:text-blue-600">
                    <i class="fa-solid fa-arrows-rotate text-base"></i> Repost
                </button>
                @auth
                @php
                $isSaved = $post->isSavedByUser(Auth::id());
                @endphp

                <form action="{{ route('save', $post->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors cursor-pointer {{ $isSaved ? 'text-blue-600 font-bold' : 'text-gray-500' }}">
                        <i class="{{ $isSaved ? 'fa-solid fa-bookmark text-blue-600' : 'fa-regular fa-bookmark text-gray-400' }} w-4"></i>
                        <span>{{ $isSaved ? 'Saved' : 'Save' }}</span>
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="flex-1 flex items-center justify-center gap-2 hover:bg-gray-50 py-2 rounded-lg transition-colors text-xs font-semibold text-gray-500">
                    <i class="fa-regular fa-bookmark text-gray-400 w-4"></i> Save
                </a>
                @endauth
            </div>
            <div x-show="isCommentsOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="border-t border-gray-100 pt-4 space-y-4"
                style="display: none;">

                @auth
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="flex items-start gap-3">
                    @csrf
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold shadow-sm flex-shrink-0">
                        {{ auth()->user() ? strtoupper(substr(auth()->user()->name, 0, 1)) : 'U' }}
                    </div>

                    <div class="flex-1 flex items-end gap-2 bg-gray-50 border border-gray-200 rounded-2xl px-3 py-1.5 focus-within:ring-1 focus-within:ring-blue-500 focus-within:border-blue-500 focus-within:bg-white transition-all">

                        <textarea name="content"
                            rows="1"
                            maxlength="500"
                            placeholder="Add a professional comment..."
                            class="flex-1 bg-transparent text-sm text-gray-800 placeholder-gray-400 focus:outline-none resize-none overflow-hidden py-1 px-1 min-h-[24px] max-h-[120px]"
                            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px'"></textarea>

                        <button type="submit" class="flex items-center justify-center w-8 h-8 text-blue-600 hover:bg-blue-50 rounded-full transition-colors cursor-pointer shrink-0 mb-0.5">
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                        </button>

                    </div>
                </form>
                @else
                <div class="bg-gray-50 rounded-xl p-3 text-center border border-gray-100">
                    <p class="text-xs text-gray-500">
                        Please <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Log in</a> to write a comment.
                    </p>
                </div>
                @endauth

                <div class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    @forelse($post->comments as $comment)
                    <div class="flex items-start gap-2.5 group">
                        <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 text-xs font-bold shadow-sm flex-shrink-0">
                            {{ $comment->user ? strtoupper(substr($comment->user->name, 0, 1)) : 'M' }}
                        </div>

                        <div class="flex-1 bg-gray-50 rounded-2xl px-3 py-2 text-xs relative border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="font-bold text-gray-900 hover:text-blue-600 cursor-pointer">{{ $comment->user->name ?? 'Membre LinkUp' }}</span>
                                    <span class="text-[10px] text-gray-400 font-normal block">{{ $comment->user->headline ?? 'Professionnel' }}</span>
                                </div>
                                <span class="text-[10px] text-gray-400">{{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Now' }}</span>
                            </div>
                            <p class="text-gray-700 mt-1.5 text-sm leading-normal whitespace-pre-line">
                                {{ $comment->content }}
                            </p>

                            @can('delete', $comment)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="absolute right-2 top-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500 p-1 rounded-md hover:bg-gray-100 transition-colors cursor-pointer">
                                    <i class="fa-regular fa-trash-can text-xs"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-xs text-gray-400 py-2">Be the first to comment on this post!</p>
                    @endforelse
                </div>
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
                    <textarea name="content" rows="6"
                        placeholder="What do you want to talk about?"
                        class="w-full text-base text-gray-800 placeholder-gray-400 border-none resize-none focus:outline-none focus:ring-0 bg-transparent"></textarea>
                    @error('content')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="px-6 py-2 flex items-center gap-2 text-gray-500">
                    <label class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a photo">
                        <input type="file" name="post_image" accept="image/*" class="hidden" onchange="console.log('Image selected:', this.files[0].name)">
                        <i class="fa-regular fa-image text-lg"></i>
                    </label>

                    <label class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a video">
                        <input type="file" name="post_video" accept="video/*" class="hidden" onchange="console.log('Video selected:', this.files[0].name)">
                        <i class="fa-regular fa-video text-lg"></i>
                    </label>

                    <label class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 hover:text-blue-600 transition cursor-pointer" title="Add a document">
                        <input type="file" name="post_document" accept=".pdf,.doc,.docx,.txt" class="hidden" onchange="console.log('Document selected:', this.files[0].name)">
                        <i class="fa-regular fa-file-lines text-lg"></i>
                    </label>
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
<script src="{{ asset('js/alerts.js') }}"></script>
@endsection