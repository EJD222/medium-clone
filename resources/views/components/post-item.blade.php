<div class="flex my-8 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="flex-1 p-5">
        <a href="{{ route('post.show', [
                'username' => $post->user->username,
                'post' => $post,
            ]) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $post->title }}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ Str::words($post->content, 15) }}
        </p>
        <x-primary-button>
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </x-primary-button>

        <div class="flex items-center gap-4 mt-4 text-sm text-gray-400">
            <div class="flex items-center gap-2">
                <img src="{{ $post->user->imageUrl() }}" 
                    alt="{{ $post->user->username }}"
                    class="w-8 h-8 rounded-full">
                
                <div class="flex items-center gap-1 text-gray-900 dark:text-white">
                    By:
                    <a href="{{ route('profile.show',  $post->user->username) }}"         
                    class="font-semibold text-gray-600 hover:underline">
                        {{ $post->user->username }}
                    </a>
                    <span class="text-gray-500">
                        at {{ $post->formatDate() }}
                    </span>
                </div>
            </div>
           
            <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24" 
                    fill="currentColor" 
                    class="w-5 h-5">
                    <path
                        d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                </svg>
                {{ $post->claps_count }}
            </span>
        </div>
    </div>
    
    <a href="#">
        <img class="object-cover w-48 h-full rounded-r-lg max-h-64" src="{{ $post->imageURL() }}" alt="" />
    </a>
</div>