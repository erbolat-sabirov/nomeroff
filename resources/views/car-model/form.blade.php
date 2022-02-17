<div class="mb-4">
    <label for="car_brand_id" class="block mb-2 text-sm font-medium text-gray-900">Бренд</label>
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
    <label class="block text-sm font-bold text-gray-700" for="title">
        Название
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('title') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="title" placeholder="Введите название" value="{{ $model->title }}" required />
    @error('title')
    <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>
