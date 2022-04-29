<x-app-layout>
    <div class="flex flex-col items-center justify-center h-full my-auto">

        @auth
            <div class="text-gray-600 text-5xl mb-8">مرحباً {{ auth()->user()->name }}</div>
        @endauth

        <img src="{{ asset('images/AES.png') }}" alt="AES" class="rounded-lg">

    </div>
</x-app-layout>
