<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Shop
        </h2>
    </x-slot>

    <div class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-2">{{ $product->description }}</p>
                        <p class="text-pink-600 font-bold text-lg">${{ number_format($product->price, 2) }}</p>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-300 col-span-3">No products available.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>