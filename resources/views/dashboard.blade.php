@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <p class="mb-8 text-2xl font-semibold text-gray-800">
        Dashboard
    </p>

    <div class="flex flex-row justify-between flex-wrap space-x-3 space-y-5">
        @if ($user->role !== "ADMIN")
        <div class="flex justify-between pl-6 pt-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400">Selamat datang kembali,</p>
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$user->name}}!</h5>
                {{-- @if ($user->role == 'STUDENT')
                    <div class="flex flex-col mt-10 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-red-600/80">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="max-w-[150px] text-center text-red-600/80">Pembayaran belum berhasil!</span>
                    </div>
                @endif --}}
            </div>
            <img class="max-w-md" src="{{asset('img/svg/vector-user-dashboard.svg')}}" alt="" srcset="">
        </div>
        @else
            <div class="space-y-4">
                <div class="flex  justify-between p-5  bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <canvas class="w-full h-96" id="myChartLine"></canvas>
                    </div>
    
                
                </div>
    
                <div class="flex space-x-6 justify-between p-5  bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <canvas class="w-full h-96" id="myChart"></canvas>
                    </div>
    
                    <div >
                        <canvas class="w-full h-96" id="myChart2"></canvas>
                    </div>
                    
    
                </div>

            </div>
        @endif
{{-- 
        @if ($user->role !== 'STUDENT')
        <div class="flex flex-wrap space-x-3">
            <div class="block p-6 text-center w-56 bg-orang rounded-lg border border-orange-300 shadow-md hover:bg-orange-400 dark:bg-orang dark:border-orang-700 dark:hover:bg-orang-700">
                <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Pendaftar</h5>
                <h5 class="mt-6 mb-6 p-3 rounded-md bg-orange-300 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$datas['pendaftar']}}</h5>
            </div>
            <div class="block p-6 text-center w-56 bg-reb rounded-lg border border-red-300 shadow-md hover:bg-red-600 dark:bg-reb dark:border-red-700 dark:hover:bg-red-700">
                <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Kelompok</h5>
                <h5 class="mt-6 mb-6 p-3 rounded-md bg-red-400 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$datas['kelompok']}}</h5>
            </div>
            <div class="block p-6 text-center w-56 bg-green-500 rounded-lg border border-green-300 shadow-md hover:bg-green-600 dark:bg-green-700 dark:border-green-700 dark:hover:bg-green-700">
                <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Total Khas Kurban</h5>
                <h5 class="mt-6 p-3 rounded-md bg-green-400 mb-6 text-3xl font-bold tracking-tight text-gray-100 dark:text-white">Rp. {{ number_format($datas['saldoKhas'], 0, '.', '.')}}</h5>
            </div>
            <div class="block p-6 text-center w-56 bg-green-500 rounded-lg border border-green-300 shadow-md hover:bg-green-600 dark:bg-green-700 dark:border-green-700 dark:hover:bg-green-700">
                <h5 class="mb-2 text-2xl font-regular tracking-tight text-white dark:text-white">Menunggu pembayaran</h5>
                <h5 class="mt-6 p-3 rounded-md bg-green-400 mb-6 text-6xl font-bold tracking-tight text-gray-100 dark:text-white">{{$datas['waiting']}}</h5>
            </div>
        </div>
        @endif --}}
    </div>
@endsection

@section('script')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['2018', '2019', '2020', '2021', '2023', '2024'],
        datasets: [{
          label: 'Data Kurban',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const ctx2 = document.getElementById('myChart2');
  
    new Chart(ctx2, {
        type: 'pie',
        data: {
        labels: ['2018', '2019', '2020', '2021', '2023', '2024'],
        datasets: [{
            label: 'Data Kurban',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });

    const ctxLine = document.getElementById('myChartLine');
  
    new Chart(ctxLine, {
      type: 'line',
      data: {
      labels: ['2018', '2019', '2020', '2021', '2023', '2024'],
      datasets: [{
          label: 'Data Kurban',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
      }]
      },
      options: {
      scales: {
          y: {
          beginAtZero: true
          }
      }
      }
    });
  </script>
 
 
@endsection
