<div class="mb-4">
    <label for="service_id" class="block mb-2 text-sm font-medium text-gray-900">Услуга</label>
    <select id="service_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('service_id') border-red-800 @enderror" name="service_id" required @if(!isset($services)) disabled @endif>
        @if(isset($services))
            @foreach($services as $service)
                <option value="{{ $service->id }}" @if($service->id == $model->service_id) selected @endif>{{ $service->title }}</option>
            @endforeach
        @else
            <option value="{{ $service->id }}" @if($service->id == $model->service_id) selected @endif>{{ $service->title }}</option>
        @endif
    </select>
    @error('service_id')
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
        <input type="number" name="types[{{ $type->id }}][amount]" value="@if($model->types != null){{ $model->types[$type->id]['amount'] }}@endif" id="" class="mt-1 border-gray-300 @error('types[{{ $type->id }}][amount]') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        <br>
    @endforeach
</div>
<div class="mb-4">
    <div class="flex">
        @foreach($allServiceItems as $item)
            <div class="form-check form-check-inline mr-2">
                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="inlineCheckbox1" value="{{ $item->id }}" name="service_items[{{ $item->id }}][id]{{ $item->id }}" @if(isset($model->service_items) && array_key_exists($item->id, $model->service_items)) checked @endif>
                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox1">{{ $item->title }}</label>
            </div>
        @endforeach
    </div>
</div>
<input type="text" name="model" value="App\Models\Service" hidden>
