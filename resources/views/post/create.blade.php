<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="mb-4 text-3xl">Create New Post</h1>
            <div class="p-8 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Content')" />
                        <select id="category_id" name="category_id"
                            class="border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value={{ $category->id }} @selected(old('category_id') == $category->id)> {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <input id="image" class="block w-full mt-1" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image">SVG, PNG, JPG or
                            GIF (MAX. 800x400px).</p>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Title -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-area id="content" class="block w-full mt-1" type="text" name="content">
                            {{ old('content') }}
                        </x-text-area>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Published At -->
                    <div class="mt-4">
                        <x-input-label for="published_at" :value="__('Published At')" />
                        <x-text-input id="published_at" class="block w-full mt-1" type="datetime-local" name="published_at"
                            :value="old('published_at')" autofocus />
                        <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>
</x-app-layout>