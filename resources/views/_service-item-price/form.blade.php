<div class="mb-4">
    <label for="service_id" class="block mb-2 text-sm font-medium text-gray-900">Услуга</label>
    <select @isset($edit) disabled @endisset id="service_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('service_id') border-red-800 @enderror" name="service_id" required>
        <option value="">Выберите</option>
        @foreach($serviceItems as $service)
            <option value="{{ $service->id }}" @if($service->id == $priceModel->service_id) selected @endif>{{ $service->title }}</option>
        @endforeach
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
        <input type="number" name="types[{{ $type->id }}][amount]" value="@if($priceModel->types != null){{ $priceModel->types[$type->id]['amount'] }}@endif" id="" class="mt-1 border-gray-300 @error('types[{{ $type->id }}][amount]') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        <br>
    @endforeach
</div>
<input type="text" name="model" value="App\Models\ServiceItem" hidden>
