@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection

@section('title', $user->role === 'ADMIN' ? 'Kelola User' : 'Daftar Pegawai')

@section('content')
    <p class="mb-4 text-2xl font-semibold text-gray-800">
       Kelompok Kurban
    </p>


    <div id="employeeTabContent">
        <div class="rounded-lg" id="employee" role="tabpanel"
            aria-labelledby="employee-tab">
            <div class="flex flex-wrap">
                @foreach ($pakets as $paket )
                    <div class="block w-[32%] mb-4 mr-2 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <span class="text-green-500">{{ $paket->nama_hewan }} - BKR{{ $paket->id }}</span>
                        </h5>
                        <p>Nama Kelompok:</p>
                        @foreach ($paket->user_kelompok as $kelompok)
                            @if ($kelompok->user)
                                <div class="font-normal text-gray-700 dark:text-gray-400 flex items-center space-x-2">
                                    <span>{{ $kelompok->user->name }}</span>
                                    @if ($kelompok->status_paid == 2)
                                        <span class="text-green-500">Lunas</span>
                                    @elseif($kelompok->status_paid == 1)
                                        <span class="text-yellow-500">Waiting</span>
                                    @elseif($kelompok->status_paid == 0)
                                        <span class="text-red-500">Belum lunas</span>
                                    @endif
                                </div>
                                
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    </div>



@endsection

@section('script')
  
@endsection
