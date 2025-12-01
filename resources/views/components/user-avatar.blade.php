@props(['user', 'size' => 'w-12 h-12'])

@if ($user->getFirstMedia('avatar'))
    <img src="{{ $user->getFirstMediaUrl('avatar', 'avatar') }}" 
         alt="{{ $user->name }}"
         class="{{ $size }} rounded-full">
@else
    <div class="{{ $size }} bg-gray-300 rounded-full flex items-center justify-center">
        <span class="text-gray-600 font-bold text-sm">
            {{ substr($user->name, 0, 1) }}
        </span>
    </div>
@endif