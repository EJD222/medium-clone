<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-3xl font-bold mb-4">{{$post->title}}</h1>

                <!-- Title and Author -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />
                    <div>
                        <x-follow-container :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
                            @auth
                                &middot;
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'" :class="following ? 'text-red-600' : 'text-emerald-600'">
                                </button>
                            @endauth
                        </x-follow-container>
                        <div class="flex gap-2 text-sm text-gray-500">
                            <span> {{ $post->readTime() }} min read</span>
                            &middot;
                            <span> {{ $post->created_at->format('M d, Y') }} </span>
                        </div>
                    </div>
                </div>

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