<x-app-layout>
    <div class="flex items-center justify-center h-full my-auto w-8/12 mx-auto">
        <div class="relative flex w-full h-full p-12">
            <div class="w-3/4 space-y-8 bg-white p-8 shadow rounded-lg h-full">
                <form method="POST" action="{{ route('decrypt-file') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-bold mb-1">
                            الملف المشفر - Cipher file
                        </label>
                        <input type="file" name="cipherFile"
                            class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 appearance-none"
                            required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-bold mb-1">
                            المفتاح - key
                        </label>
                        <input type="text" name="key"
                            class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 appearance-none"
                            required />
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 hover:border-green-700 rounded text-white border-green-600 font-semibold shadow focus:outline-none py-2 px-3 w-full">فك
                            تشفير الملف والتنزيل</button>
                    </div>
                </form>
            </div>
            <div class="w-3/4 bg-white p-8 shadow rounded-lg mr-8">
                <div class="bg-yellow-300 p-4 rounded-lg mb-6 text-center font-semibold">فك تشفير المفتاح ،
                    بإستخدام المفتاح
                    الخاص ( Private
                    key ).</div>
                <form method="POST" action="{{ route('decrypt-key') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-bold mb-1">
                            المفتاح المشفر - cipher key
                        </label>
                        <input type="file" name="cipherKeyFile"
                            class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 appearance-none"
                            required />
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 hover:border-green-700 rounded text-white border-green-600 font-semibold shadow focus:outline-none py-2 px-3 w-full">فك
                            تشفير المفتاح والتنزيل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
