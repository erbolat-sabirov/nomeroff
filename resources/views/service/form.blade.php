<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="name">
        Название
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('title') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="title" placeholder="Введите название" value="{{ $model->title }}"  />
    @error('title')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="description">
        Описание
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('description') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="description" placeholder="Введите описание" value="{{ $model->description }}"  />
    @error('description')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <p>
        Тип машины - цена
    </p>
    @foreach($types as $type)
        <input type="text" value="{{ $type->title }}" class="mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" disabled>
    -
        <input type="number" name="price[types][{{ $type->id }}][amount]" value="@if($priceModel->types != null){{ $priceModel->types[$type->id]['amount'] }}@endif" id="" class="mt-1 border-gray-300 @error('types[{{ $type->id }}][amount]') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
        <br>
    @endforeach
    @error('price.type')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <div class="flex">
        @foreach($allServiceItems as $item)
            <div class="form-check form-check-inline mr-2">
                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox1" value="{{ $item->id }}" name="price[service_items][{{ $item->id }}][id]{{ $item->id }}" @if(isset($priceModel->service_items) && array_key_exists($item->id, $priceModel->service_items)) checked @endif>
                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">{{ $item->title }}</label>
            </div>
        @endforeach
    </div>
    @error('price.service_items')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>
<input type="text" name="price[model]" value="App\Models\Service" hidden>

