@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', $user->name)

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-500">
        @if ($user->role === 'ADMIN')
        <a href="{{route('student.index')}}" class="text-gray-800" href="">Siswa</a>
        <i class="fa-solid fa-chevron-right text-lg text-primary mx-2"></i>
        {{ $user->name }}
        @else
        <a href="{{route('student.index')}}" class="text-gray-800" href="">Kelompok Saya</a>
        @endif
    </p>

    <div class="p-4 flex flex-wrap  bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
        
        @foreach ($kelompoks->user_kelompok as $kelompok )
            <div class="w-full max-w-xs mr-1 mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div class="w-24 h-24 mb-3 rounded-full shadow-lg flex items-center justify-center" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-gray-900/70">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        
                        
                    </div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $kelompok->user->name ?? 'Tidak di tampilkan' }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $kelompok->user->alamat ?? 'Tidak di tampilkan' }}</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#" class="inline-flex items-center @if($kelompok->status_paid == 0) text-red-500/80 @elseif($kelompok->status_paid == 1) text-yellow-400 @else text-green-500/80 @endif justify-center space-x-2 px-10 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                            
                            
                            @if ($kelompok->status_paid == 2)
                            <span>Pembayaran:</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                            @elseif($kelompok->status_paid == 0)
                                <span>Not Paid:</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @elseif($kelompok->status_paid == 1)
                            <span>Waiting</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            @endif
                            
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  


@endsection
