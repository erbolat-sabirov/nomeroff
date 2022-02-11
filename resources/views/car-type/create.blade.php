<x-app-layout>
    <x-slot name="header">
        <div class="container max-w-7xl mx-auto mt-8">
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Создать тип машины
                </h2>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="max-w-7xl mx-auto mt-8">
            <form method="POST" action="{{ route('car-type.store') }}">
                @csrf
                @include('car-type.form')
                <div class="flex items-center justify-start mt-4 gap-x-2">
                    <button type="submit" class="px-6 py-2 mr-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        Сохранить
                    </button>
                    <a class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300" href="{{ route('car-type.index') }}">
                        Назад
                    </a>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
