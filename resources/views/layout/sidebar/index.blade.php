<aside class="w-64 bg-[#005331] shadow-sm drop-shadow-lg absolute inset-y-0 left-0 transform -translate-x-full lg:relative lg:translate-x-0 transition duration-200 ease-in-out " aria-label="Sidebar">
    <div class="px-3 py-4 rounded dark:bg-gray-800 ">
        <div class="text-center">
            <img class="mx-auto w-24 mb-1" src="{{ env('LOGO') }}" alt="" srcset="">
            <h4 class="font-semibold text-white">Baznas Kurban Berasama</h4>
        </div>
        @include('layout.sidebar._menu')
    </div>
</aside>
