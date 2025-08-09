<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <h1 class="mb-4 text-3xl font-bold">{{$post->title}}</h1>

                <!-- Title and Author -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />
                    <div>
                        <x-follow-container :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
                            @auth
                                &middot;
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'text-red-600' : 'text-emerald-600'">
                                </button>
                            @endauth
                        </x-follow-container>
                        <div class="flex gap-2 text-sm text-gray-500">
                            <span> {{ $post->readTime() }} min read</span>
                            &middot;
                            <span> {{ $post->formatDate() }} </span>
                        </div>
                    </div>
                </div>

                @if($post->user_id === Auth::id())
                    <div class="pt-4 mt-8 border-t border-gray-200">
                        <x-primary-button href="{{ route('post.edit', $post->slug)}}">
                            Edit Post
                        </x-primary-button>
                        <form class="inline-block" action="{{ route('post.destroy', $post)}}" method="post">
                            @csrf
                            @method('delete')
                            <x-danger-button>
                                Delete Post
                            </x-danger-button>
                        </form>
                    </div>
                @endif

                <!-- Clap Section -->
                @auth
                    <x-clap-button :post="$post" />
                @endauth

                <!-- Content Section -->
                <div class="mt-4">
                    <img src="{{ $post->imageURL() }}" alt="{{ $post->title }}" />
                    <div class="mt-2">
                        {{ $post->content }}
                    </div>
                </div>

                <!-- Clap Section -->
                @auth
                    <x-clap-button :post="$post" />
                @endauth
            </div>
        </div>
</x-app-layout>