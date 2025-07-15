@props(['disabled' => false])

<input {{ $attributes->merge([
    'class' => 'text-black bg-white placeholder-gray-500 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
]) }}>
