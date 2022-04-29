<x-app-layout>
    <div class="flex flex-col items-center justify-center h-full my-auto">

        <div class="max-w-lg w-full space-y-8 bg-white p-8 shadow rounded-lg">

            <div class="bg-yellow-300 p-4 rounded-lg">عند إنشاء مفتاح معُلن ( Public key ) جديد ، سيتم إنشاء وتخزين مفتاح
                خاص
                (Private key ) تابع له.</div>
            <form method="POST" action="{{ route('pair-keys') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-bold mb-1">
                        المفتاح المعُلن (Public Key)
                    </label>
                    <textarea cols="30" rows="10"
                        class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 appearance-none">{{ $publicKey }}</textarea>
                </div>
                <div>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 hover:border-green-700 rounded text-white border-green-600 font-semibold shadow focus:outline-none py-2 px-3 w-full">
                        إنشاء مفتاح جديد
                    </button>
                </div>
            </form>
            <form method="POST" action="{{ route('download.public-key') }}">
                @csrf
                <a href="#"
                    class="flex justify-center border-2 hover:bg-gray-50 rounded border-green-600 text-green-600 font-semibold shadow focus:outline-none py-2 px-3 w-full"
                    onclick="event.preventDefault(); this.closest('form').submit();">تنزيل المفتاح
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
