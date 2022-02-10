<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="name">
        Имя
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('name') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="text" name="name" placeholder="Введите имя" value="{{ $model->name }}" required />
    @error('name')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="email">
        Email
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('email') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="email" name="email" placeholder="Введите Email" value="{{ $model->email }}" required />
    @error('email')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="password">
        Пароль
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('password') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="password" name="password" placeholder="Введите пароль" required />
    @error('password')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-bold text-gray-700" for="password_confirmation">
        Подтвердите пароль
    </label>

    <input
        class="block w-full mt-1 border-gray-300 @error('password_confirmation') border-red-800 @enderror rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="password" name="password_confirmation" placeholder="Подтвердите пароль" required />
</div>

<input type="hidden" name="role" value="MANAGER">
