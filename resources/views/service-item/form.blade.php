<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="name">
        Название
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('title') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="title" placeholder="Введите название" value="{{ $model->title }}" required />
    @error('title')
        <p class="text-red-600">{{ $message }}</p>
    @enderror

    <br>
    <div class="mb-4">
        <p>
            Тип машины - цена
        </p>
        @foreach ($types as $type)
            <input type="text" value="{{ $type->title }}"
                class="mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                disabled>
            -
            <input type="number" name="price[types][{{ $type->id }}][amount]"
                value="@if ($priceModel->types != null){{ $priceModel->types[$type->id]['amount'] }}@endif" id=""
                class="mt-1 border-gray-300 @error('types[{{ $type->id }}][amount]') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
            <br>
        @endforeach
        @error('title')
            <p class="text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <input type="text" name="price[model]" value="App\Models\ServiceItem" hidden>
</div>
