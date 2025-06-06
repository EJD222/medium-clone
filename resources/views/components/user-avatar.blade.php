@props(['user', 'size' => 'w-12 h-12'])

@if($user->image)
    <img src="{{ $user->imageURL() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AUser-avatar.svg&psig=AOvVaw1pKSCI__PG7KN9_r7I1k18&ust=1749124044871000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLiI0v3Y140DFQAAAAAdAAAAABAE"
        alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
@endif