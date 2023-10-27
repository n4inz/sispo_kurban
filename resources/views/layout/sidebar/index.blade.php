<aside class="w-64 shadow-sm drop-shadow-lg absolute inset-y-0 left-0 transform -translate-x-full lg:relative lg:translate-x-0 transition duration-200 ease-in-out bg-white" aria-label="Sidebar">
    <div class="px-3 py-4 rounded dark:bg-gray-800 ">
        <div class="text-center">
            <img class="mx-auto w-24 mb-1" src="{{ env('LOGO') }}" alt="" srcset="">
            <h4 class="font-semibold text-blue-800">Baznas Kurban Berasama</h4>
        </div>
        @include('layout.sidebar._menu')
    </div>
</aside>
