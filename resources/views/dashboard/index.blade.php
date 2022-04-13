<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="px-4 py-6 sm:px-0">
        <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    <div class="bg-white shadow-xl">
                        <div class="py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Клиенты</h2>
                            </div>
                            <div class="mt-8">
                                <div class="flow-root" id="washing-list" data-url="{{ route('dashboard.list') }}">
                                    @include('dashboard.list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2" id="washing-form">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
