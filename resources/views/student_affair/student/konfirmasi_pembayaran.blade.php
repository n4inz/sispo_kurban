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
        <a href="{{route('student.index')}}" class="text-gray-800" href="">Konfirmasi Pembayaran</a>
        @endif
    </p>

    <div class="p-4 bg-white rounded-md dark:bg-gray-800" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
        
        <div class="flex  items-center justify-between  space-y-2">
            <div class="flex flex-col items-center justify-center w-56">
                <img class="w-28" src="https://images.bisnis.com/posts/2021/02/01/1350531/logo-bank-syariah-indonesia-1.jpg" alt="">
                <span class="text-gray-500 mt-3">7777 3325 23</span>
            </div>
            <div class="flex flex-col items-center justify-center w-56">
                <img class="w-28" src="https://i0.wp.com/umsu.ac.id/berita/wp-content/uploads/2023/09/Cara-Buka-Rekening-Mandiri-Online.jpg?resize=750%2C375&ssl=1" alt="">
                <span class="text-gray-500 ">4452 8983 9</span>
            </div>
            <div class="flex flex-col items-center justify-center w-56">
                <img class="w-28" src="https://medialampung.disway.id/upload/e60c7fb17ef375a76f66b48680c14352.jpg
                " alt="">
                <span class="text-gray-500">223 423 8921</span>
            </div>
            
            
        </div>

        <div class="w-[80%] mx-auto mt-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload Bukti Pembayaran</label>
            <form action="{{ route('student.upload_resi') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="flex items-center justify-center space-x-2">
                    <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <button class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload</button>
                </div>
            </form>

        </div>

        <div class="mt-10 text-gray-500 ">
            <p>Lakukan Pembayaran dengan mentransfer sebesar Rp. {{ number_format( $userKurban->jumlah_bayar, 0, ',', '.') }} melalui rekening baznas diatas. Setelah melakukan transfer, upload bukti resi anda untuk kami tinjau lebih lanjut. Terimah kasih atas perhatiannya</p>
        </div>

@endsection

@section('script')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  


@endsection
