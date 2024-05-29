<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
    @if ($user->role == 'ADMIN')
    <li>
        <a href="{{ route('dashboard') }}"
            class="{{ Route::currentRouteName() === 'dashboard' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : '' }}
            flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-chart-pie text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Dashboard</span>
        </a>
    </li>
    @endif
    @if ($user->role == 'ADMIN' || $user->role == 'EMPLOYEE' || $user->role == 'HEADMASTER' || $user->role == 'STUDENT')
    <li>
        <a href="{{route('visit_letter.index')}}"
            class="{{Route::currentRouteName() === 'visit_letter.index' || Route::currentRouteName() === 'visit_letter.detail' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fa fa-file text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Hewan Kurban</span>
        </a>
    </li>
    {{-- @if ($user->role !== 'EMPLOYEE')
    <li>
        <a href="{{route('paket.kurban')}}"
            class="{{Route::currentRouteName() === 'paket.kurban' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fa fa-users text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Kelompok Kurban</span>
        </a>
    </li>
    @endif --}}
    @endif
    @if ($user->role == 'ADMIN' || $user->role == 'HEADMASTER'|| $user->role == 'EMPLOYEEss')
    {{-- <li>
        <button type="button"
            class="flex items-center w-full p-1 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-kepegawaian" data-collapse-toggle="dropdown-kepegawaian">
            <i
                class="ml-1 fa fa-money text-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Keuangan</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <ul id="dropdown-kepegawaian"
            class="{{ Route::currentRouteName() === 'employee.index' ||Route::currentRouteName() === 'employee.detail' ||Route::currentRouteName() === 'employee.edit' ||Route::currentRouteName() === 'employee.activity.index' ||Route::currentRouteName() === 'employee.activity.detail' ||Route::currentRouteName() === 'employee.activity.edit'? '': 'hidden' }} py-2 space-y-2">
            <li>
                <a href="{{ route('employee.index') }}"
                    class="{{ Route::currentRouteName() === 'employee.index' ||Route::currentRouteName() === 'employee.detail' ||Route::currentRouteName() === 'employee.edit'? 'border-l-8 border-l-primary bg-gray-100 -ml-2': '' }}
                    rounded-lg flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
                    Data Keuangan
                </a>
            </li>
            <li>
                <a href="{{ route('employee.activity.index') }}"
                    class="{{ Route::currentRouteName() === 'employee.activity.index' ||Route::currentRouteName() === 'employee.activity.detail' ||Route::currentRouteName() === 'employee.activity.edit'? 'border-l-8 border-l-primary bg-gray-100 -ml-2': '' }}
                    rounded-lg flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
                    Menunggu konfirmasi
                </a>
            </li>
        </ul>
    </li> --}}

    @else

        @if ($user->role !== 'EMPLOYEE' AND $user->role !== 'STUDENT')
        <li>
            <button type="button"
                class="flex items-center w-full p-1 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                aria-controls="dropdown-kepegawaian" data-collapse-toggle="dropdown-kepegawaian">
                <i
                    class="ml-1 fa-solid fa-image-portrait text-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Kurban</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            
            <ul id="dropdown-kepegawaian"
                class="{{ Route::currentRouteName() === 'student.index' ||Route::currentRouteName() === 'student.detail' ||Route::currentRouteName() === 'student.edit'? '': 'hidden' }} py-2 space-y-2">
                <li>
                    <a href="{{ route('student.detail', $user->id) }}"
                        class="{{ Route::currentRouteName() === 'student.index' ||Route::currentRouteName() === 'employee.detail' ||Route::currentRouteName() === 'student.edit'? 'border-l-8 border-l-primary bg-gray-100 -ml-2': '' }}
                        rounded-lg flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
                        Kelompok
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.pembayaran') }}"
                        class="{{ Route::currentRouteName() === 'student.index' ||Route::currentRouteName() === 'employee.detail' ||Route::currentRouteName() === 'student.edit'? 'border-l-8 border-l-primary bg-gray-100 -ml-2': '' }}
                        rounded-lg flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
                        Konfirmasi Pembayaran
                    </a>
                </li>
            </ul>
        </li>
            
        @endif

    @endif
    {{-- @if ($user->role === 'ADMIN' || $user->role === 'HEADMASTER')
        @include('layout.sidebar.admin._item')
    @endif --}}
    {{-- <li>
        <a href="#"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-chalkboard-user text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Rapat</span>
        </a>
    </li> --}}
</ul>
<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
    <li>
        {{-- <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="icon-home"></i><span>Dashboard</span></a></li> --}}
        <a href="{{ route('logout') }}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-arrow-right-from-bracket text-lg text-red-500 transition duration-75 dark:text-red-400 group-hover:text-red-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Keluar</span>
        </a>
    </li>
</ul>
