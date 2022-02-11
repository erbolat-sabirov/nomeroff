<x-app-layout>
    <x-slot name="header">
        <div class="container max-w-7xl mx-auto mt-8">
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Просмотр машины
                </h2>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">



        <div class="flex flex-row">
            <div class="basis-1/2">
                <p>
                    Тип - {{ $model->carType->title }}

                </p>
                <p>
                    Бренд - {{ $model->carBrand->title }}
                </p>
                <p>
                    Модель - {{ $model->carModel->title }}
                </p>
                <p>
                    Номер - {{ $model->number }}
                </p>
                <p>
                    Зона - {{ $model->zone }}
                </p>
                <p>
                    Телефон - {{ $model->phone }}
                </p>
                <p>
                    Дата - {{ $model->created_at }}
                </p>
            </div>
            <div class="basis-1/2">
                Описание
                <p>{{ $model->description }}</p>
            </div>
        </div>
    </x-slot>
</x-app-layout>
