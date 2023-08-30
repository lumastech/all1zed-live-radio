<x-web-template>
    <div class="container p-2 pt-9 pb-16 mx-auto backdrop-blur">
        <div class="relative">
            <img src="{{ asset('assets/bg1.png') }}" alt="live radio" class="rounded-md aspect-video w-full">
            <img src="{{ asset('assets/full-logo.png') }}" alt="live radio" class="absolute bottom-4 left-4" width="200">
        </div>
        <div class="grid grid-cols-12 mt-9 gap-4">
            @foreach($channels as $channel)
            <div class="col-span-6 md:col-span-3 bg-blue-900/50 rounded border border-blue-900 shadow hover:shadow-xl hover:border hover:border-blue-600 text-white hover:bg-gray-900/50 transtion-all duration-150">
                <a href="{{ url('play') }}/{{ $channel->id }}" class="col-span-6 md:col-span-3">
                    <div class="photo">
                        <img src="{{ asset($channel->image) }}" alt="" class="aspect-video w-full">
                    </div>
                    <div class="p-2">
                        <h2>{{ $channel->title }}</h2>
                        <p>{{ $channel->description }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</x-web-template>
