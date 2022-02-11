<x-app-layout>
    <x-slot name="header">
        <div class="container max-w-7xl mx-auto mt-8">
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Менеджеры
                </h2>
            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        @if(session('success'))
            <x-package-alert/>
        @endif
        @forelse($models as $manager)
            @if($loop->first)
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Имя</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Создан</th>
                                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="2">
                                        Действия</th>
                                </tr>
                                </thead>
                                @endif
                                <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            {{ $manager->id }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $manager->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $manager->email }}
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <span>{{ $manager->created_at }}</span>
                                    </td>

                                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                        <a href="{{ route('managers.edit', $manager) }}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">
                                            Редактировать
                                        </a>
                                    </td>
                                    <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                        <form action="{{ route('managers.destroy', $manager) }}" method="post" onSubmit="if(!confirm('Вы действительно хотите удалить менеджера?')){return false;}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="px-4 py-2 rounded-md bg-red-500 text-red-100 hover:bg-red-600">
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                                @if($loop->last)
                            </table>
                        </div>
                    </div>
                </div>
                {{ $models->links() }}
            @endif
        @empty
            Менеджеры отсутствуют
        @endforelse
            <div class="flex justify-end mt-2">
                <a class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('managers.create') }}">Создать менеджера</a>
            </div>
    </x-slot>
</x-app-layout>
