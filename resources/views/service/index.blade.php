<x-app-layout>
    <x-slot name="header">
        Услуги
    </x-slot>

    <x-slot name="slot">
        @if(session('success'))
            <x-package-alert/>
        @endif
        <div class="flex justify-start mb-4 mt-2">
            <a class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600 mr-2" href="{{ route('services.create') }}">Создать услугу</a>
            {{-- <a class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('service-prices.create') }}">Создать цену на услугу</a> --}}
        </div>
            @forelse($models as $service)
                @if($loop->first)
                    <div class="flex flex-col mb-4">
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
                                            Название</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Описание</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Создан</th>
                                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="3">
                                            Действия</th>
                                    </tr>
                                    </thead>
                                    @endif
                                    <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                {{ $service->id }}
                                            </div>

                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $service->title }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $service->description }}
                                        </td>

                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <span>{{ date('d-m-Y h:i', strtotime($service->created_at)) }}</span>
                                        </td>

                                        <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('services.edit', $service) }}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">
                                                Редактировать
                                            </a>
                                        </td>
                                        {{-- <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200">
                                            @if ($service->hasServiceCarTypes())
                                                <a href="{{ route('service-prices.edit', $service) }}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">
                                                    Цены
                                                </a>
                                            @endif
                                        </td> --}}
                                        <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                            <form action="{{ route('services.destroy', $service) }}" method="post" onSubmit="if(!confirm('Вы действительно хотите удалить услугу?')){return false;}" class="text-center">
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
                Услуги отсутствуют
            @endforelse
    </x-slot>

</x-app-layout>
