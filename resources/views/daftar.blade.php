<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('img/svg/baznas.png')}}" type="image/x-icon">

    <link href="/css/app.css" rel="stylesheet">

    <title>Daftar Kurban - Baznas</title>
</head>
<body>
    <div class="h-screen grid lg:grid-cols-1 ">
        <div class="flex justify-center items-center ">
            <div class="flex flex-col items-center">
                <img class="w-[150px]" src="{{ env('LOGO') }}" alt="" srcset="">
                <p class="text-2xl text-[#005331] font-bold mt-3">Daftar Kurban Baznas Parepare</p>
                
                <form class="w-full mt-10" action="{{route('daftar')}}" method="post">
                    <div class="">
                        @csrf
                        <div class="relative z-0 mb-6 w-full group">
                            <select name="kurban" id="paket" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer" placeholder=" " required>
                                    <option value="EMPLOYEE">Masjid</option>
                                    <option value="STUDENT">Kurban Mandiri</option>
                            </select>
                           
                            <label for="paket" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kurban</label>
                    
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="nama" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer" placeholder=" " required />
                            <label for="nama" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama / Masjid</label>
                        </div>
                       
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="email" name="email" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer" placeholder=" " required />
                            <label for="email" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        </div>

                        <div class="relative z-0 mb-6 w-full group">
                            <input type="password" name="password" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary focus:outline-none focus:ring-0 focus:border-primary peer" placeholder=" " required />
                            <label for="alamat" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        </div>
                     
                    </div>
                    <button type="submit" class="text-white bg-[#005331] hover:bg-primary focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary">Daftar Kurban</button>
                </form>
                {{-- <div id="alert-failed" class="mt-6 bg-gray-100 rounded border-2 border-gray-300 p-4 text-center invisible text-md font-bold">
                    <p class="text-red-700">Gagal Masuk</p>
                    <p>Mohon periksa kembali username dan password</p>
                    <p>yang digunakan.</p>
                </div> --}}
            </div>
        </div>
        {{-- <div class="h-screen hidden lg:block xl:-ml-28 2xl:-ml-36" style="background-color: #1F3986">
            <div class="h-screen bg-no-repeat" style="background-image: url('{{asset('img/svg/login-right.svg')}}')"></div>
        </div> --}}
    </div>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script>
        @if (session('success'))
            $('#alert-failed').toggleClass('invisible');
            setTimeout(function () {
                $('#alert-failed').toggleClass('invisible');
            }, 5000);
        @endif

        $('#btn-hide-pass').click(function (e) {
            const type = $('#password').attr('type') === 'password' ? 'text' : 'password';
            $('#password').attr('type', type);
            if(type === 'password') {
                $('#icon-eye-open').toggleClass('hidden', false);
                return $('#icon-eye-close').toggleClass('hidden', true);
            } else {
                $('#icon-eye-open').toggleClass('block', false);
                $('#icon-eye-open').addClass('hidden');
                return $('#icon-eye-close').toggleClass('hidden', false);
            };
        });

        $('#paket').change(function(){
            val = $(this).val();
            var angkaTerpisah = val.split('-');

            var angkaPertama = parseInt(angkaTerpisah[0]);
            var angkaKedua = parseInt(angkaTerpisah[1]);
            $('#harga').val('Rp '+angkaPertama);
            $('#pakets').val(angkaKedua);
        })
    </script>
</body>
</html>
