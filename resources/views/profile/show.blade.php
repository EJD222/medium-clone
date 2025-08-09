<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl font-bold">{{ $user->name }}</h1>
                        <div class="mt-4">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>
                            @empty
                                <div class="py-16 text-center text-gray-400">No posts were found.</div>
                            @endforelse
                            {{ $posts->onEachSide(1)->links() }}
                        </div>
                    </div>
                    <x-follow-container :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500"><span x-text="followersCount"></span> followers</p>
                        <p>
                            {{ $user->bio }}
                        </p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button @click="follow()" class="px-4 py-2 text-white rounded-full"
                                    x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'bg-red-600' : 'bg-emerald-600'">
                                </button>
                            </div>
                        @endif
                    </x-follow-container>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>