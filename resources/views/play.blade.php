<x-web-template>
    <div class="container p-2 pt-9 pb-16 mx-auto backdrop-blur">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-6">
                <div class="relative">
                    <h2 class="text-2xl capitalize text-white bg-pink-900/70 px-2">{{ $channel->title }}</h2>
                    <img src="{{ asset($channel->image) }}" alt="live radio" class="rounded-md aspect-video w-full text-white bg-blue-900/50">
                    <img id="anim" src="{{ asset('assets/anim3.gif') }}" alt="live radio" class="absolute bottom-10 left-0 hidden w-100 md:w-200">
                    <div class="play-controls text-center">
                        <button onclick="channelPlay('play')" class="play mt-2 px-4 py-1 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">Play</button>
                        <button onclick="channelPlay('pause')" class="pause mt-2 px-4 py-1 bg-teal-500 hover:bg-teal-700 text-white transition-all duration-150 rounded shadow">Pause</button>
                    </div>
                    <audio src="{{ asset($channel->link) }}" id="audio"></audio>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6">
                @foreach($channels as $item)
                    <a href="{{ url('play') }}/{{ $item->id }}" class="col-span-6 md:col-span-3">
                        <div class="grid grid-cols-12 mb-1 gap-4 bg-pink-900/70 md:bg-blue-900/50 rounded border border-blue-900 shadow hover:shadow-xl hover:border hover:border-blue-600 text-white hover:bg-gray-900/50 transtion-all duration-150">
                            <div class="col-span-3">
                                <img src="{{ asset($item->image) }}" alt="" class="aspect-video w-full">
                            </div>
                            <div class="col-span-9">
                                <h2 class="text-md capitalize">{{ $item->title }}</h2>
                                <p class="text-xs">{{ $item->description }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // play
        function channelPlay(action) {
            // const stream = new Audio("{{ asset($channel->link) }}");
            const stream = document.getElementById('audio');

            if (action=='play') {
                stream.play();
                document.getElementById('anim').classList.remove('hidden');
            }

            if (action=='pause') {
                stream.pause();
                document.getElementById('anim').classList.add('hidden');
            }

            if (action=='stop') {
                stream.stop();
                document.getElementById('anim').classList.add('hidden');
            }
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            if ("{{ asset($channel->link) }}") {
                channelPlay('play');
            }
        });
    </script>
</x-web-template>
