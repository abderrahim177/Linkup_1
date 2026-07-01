@extends('layouts.master')

@section('content')
@if ($errors->any())
    <div style="color: red; background: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4">
            <textarea name="content" rows="6" required
                placeholder="What do you want to talk about?"
                class="w-full text-base text-gray-800 placeholder-gray-400 border-none resize-none focus:outline-none focus:ring-0 bg-transparent">{{ old('content', $post->content) }}</textarea>
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
                Update Post
            </button>
        </div>
    </form>
@endsection
    