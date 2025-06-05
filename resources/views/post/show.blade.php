<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-3xl font-bold mb-4">{{$post->title}}</h1>
                <!-- Title and Author -->
                <div class="flex gap-4">
                    @if($post->user->image)
                        <img src="{{ $post->user->imageURL() }}" alt="{{ $post->user->name }}"
                            class="w-12 h-12 rounded-full">
                    @else
                        <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AUser-avatar.svg&psig=AOvVaw1pKSCI__PG7KN9_r7I1k18&ust=1749124044871000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLiI0v3Y140DFQAAAAAdAAAAABAE"
                            alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full">
                    @endif
                    <div>
                        <div class="flex gap-2">
                            <h3>{{ $post->user->name }}</h3>
                            &middot;
                            <a href="#" class="text-emerald-500">Follow</a>
                        </div>
                        <div class="flex gap-2 text-sm text-gray-500">
                            <span> {{ $post->readTime() }} min read</span>
                            &middot;
                            <span> {{ $post->created_at->format('M d, Y') }} </span>
                        </div>
                    </div>
                </div>
                <!-- Clap Section -->
                <x-clap-button />
                <!-- Content Section -->
                <div class="mt-4">
                    <img src="{{ $post->imageURL() }}" alt="{{ $post->title }}" />
                    <div class="mt-2">
                        {{ $post->content }}
                    </div>
                </div>
                <!-- Clap Section -->
                <x-clap-button />
            </div>
        </div>
</x-app-layout>