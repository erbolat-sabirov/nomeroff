<div class="mb-4">
    <label for="car_type_id" class="block mb-2 text-sm font-medium text-gray-900">Тип Машины</label>
    <select id="car_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('car_type_id') border-red-800 @enderror" name="car_type_id" required>
        @foreach($types as $key => $value)
            <option value="{{ $key }}" @if($key == $model->car_type_id) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('car_type_id')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="car_brand_id" class="block mb-2 text-sm font-medium text-gray-900">Тип Машины</label>
    <select id="car_brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('car_brand_id') border-red-800 @enderror" name="car_brand_id" required>
        @foreach($brands as $key => $value)
            <option value="{{ $key }}" @if($key == $model->car_brand_id) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('car_brand_id')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="car_model_id" class="block mb-2 text-sm font-medium text-gray-900">Тип Машины</label>
    <select id="car_model_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('car_model_id') border-red-800 @enderror" name="car_model_id" required>
        @foreach($carModels as $key => $value)
            <option value="{{ $key }}" @if($key == $model->car_model_id) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @error('car_model_id')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="number">
        Номер
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('number') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="number" placeholder="Введите номер" value="{{ $model->number }}" required />
    @error('number')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="zone">
        Зона
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('zone') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="zone" placeholder="Зона" value="{{ $model->zone }}" required />
    @error('number')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="phone">
        Телефон
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('phone') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="phone" placeholder="Введите телефон" value="{{ $model->phone }}" required />
    @error('phone')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="description">
        Описание
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('description') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="description" placeholder="Введите описание" value="{{ $model->description }}" required />
    @error('description')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

