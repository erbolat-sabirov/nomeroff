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

