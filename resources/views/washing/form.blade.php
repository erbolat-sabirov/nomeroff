<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        <label for="service_id" class="block mb-2 text-lg font-medium text-gray-900">Комплексные услуги</label>
        <div>
            <select id="service_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('service_id') border-red-800 @enderror" name="service_id" required>
                @foreach($services as $key => $value)
                    <option value="{{ $key }}" @if($key == $model->service_id) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
            @error('service_id')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mb-4">
        <label for="status" class="block mb-2 text-lg font-medium text-gray-900">Статус</label>
        <div>
            <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('status') border-red-800 @enderror" name="status" required>
                @foreach($statuses as $key => $value)
                    <option value="{{ $key }}" @if($key == $model->status) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
            @error('status')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="mb-4">
    <label for="service_id" class="block mb-2 text-lg font-medium text-gray-900">Услуги</label>
    <div class="flex flex-wrap">
        @foreach($serviceItems as $key => $value)
            <div class="form-check form-check-inline mr-2">
                <input 
                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="checkbox" 
                    id="inlineCheckbox{{$key}}" 
                    value="{{ $key }}" 
                    name="service_items[{{$key}}][service_item_id]" 
                    @if(in_array($key, $model->service_items)) checked @endif
                >
                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox{{$key}}">{{ $value }}</label>
            </div>
        @endforeach
    </div>
    @error('price.service_items')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="service_id" class="block mb-2 text-lg font-medium text-gray-900">Сотрудники</label>
    <div class="flex flex-wrap">
        @foreach($users as $key => $value)
            <div class="form-check form-check-inline mr-4 mb-4">
                <input 
                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="checkbox" 
                    id="inlineCheckbox{{$key}}" 
                    value="{{ $key }}" 
                    name="washing_users[{{$key}}][user_id]" 
                    @if(in_array($key, $model->washing_users)) checked @endif
                >
                <label class="form-check-label inline-block text-gray-800" for="inlineCheckbox{{$key}}">{{ $value }}</label>
            </div>
        @endforeach
    </div>  
    @error('price.washing_users')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Отправить
</button>



