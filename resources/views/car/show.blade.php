<x-app-layout>
    <x-slot name="header">
        Просмотр машины
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
