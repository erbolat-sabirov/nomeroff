<div id="car-data" class="py-6 px-4 sm:px-6">
    <div class="flex justify-between mb-4">
        <div class="text-2xl">{{ $washing->car->number }}</div>
        <div>
            <a href="{{ route('cars.edit', ['car' => $washing->car]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4">
        <div class="mb-4">
            <label for="car_type_id" class="block mb-2 text-sm font-medium text-gray-900">Тип Машины</label>
            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->carType->title }}" />
        </div>

        <div class="mb-4">
            <label for="car_brand_id" class="block mb-2 text-sm font-medium text-gray-900">Бренд Машины</label>
            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->carBrand->title }}" />
        </div>

        <div class="mb-4">
            <label for="car_model_id" class="block mb-2 text-sm font-medium text-gray-900">Модель Машины</label>
            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->carModel->title }}" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700" for="zone">
                Зона
            </label>

            <input disabled
                class="block w-full mt-1 border-gray-300  rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->zone }}" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700" for="phone">
                Телефон
            </label>

            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->phone }}" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700" for="full_name">
                Имя
            </label>

            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->full_name }}" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700" for="full_name">
                Описание
            </label>

            <input disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" value="{{ $washing->car->description }}" />
        </div>
    </div>

</div>