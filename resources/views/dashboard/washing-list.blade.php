<ul role="list" class="-my-6 divide-y divide-gray-200">
    @foreach ($models as $model)
        <li >
            
                <div class="flex py-6">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                            alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                            class="h-full w-full object-cover object-center">
                    </div>
                    <div class="ml-4 flex flex-1 flex-col">
                        <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <h3>
                                    {{ $model->car?->number }}
                                </h3>
                                {{-- <p class="ml-4">{{ $model->getPrice() }}</p> --}}
                            </div>
                            <p class="mt-1 text-sm text-gray-500">{{ $model->getNewTime() }}</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Qty 1</p>
        
                            <a class="washing-element block" href="{{ route('washings.edit', ['washing' => $model]) }}">Edit</a>
                            <div class="flex">
                                <span
                                    class="font-medium rounded-md px-2 text-white {{ $model->getStatusColor() }}">{{ $model->getStatus() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            
        </li>
    @endforeach
</ul>
