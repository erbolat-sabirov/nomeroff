<div class="bg-white shadow-xl">
    @include('washing.car-data')
</div>
<br>
<div class="bg-white shadow-xl">
    <div class="py-6 px-4 sm:px-6">

        <form action="{{ route('washings.update', $washing) }}" method="POST">
            @method('PUT')
            @csrf
            @include('washing.form')
        </form>
    </div>
</div>
