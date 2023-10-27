<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="modal-edit-visit">
    <div class="relative px-4 w-full max-w-7xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Kunjungan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="modal-edit-visit">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="p-6 space-y-6">
                    <div class="flex flex-row flex-wrap">
                        <div class="flex-1 px-3">
                            <div class="mb-6">
                                <label for="nama_hewan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nama Hewan</label>
                                <select id="nama_hewan" name="nama_hewan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    required>
                                    <option disabled selected value="--Pilih Hewan--">
                                        -- Pilih Hewan --</option>
                                    <option value="Sapi">
                                        Sapi</option>
                                    <option value="Kambing">
                                        Kambing</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <div class="flex items-center justify-start space-x-3">
                                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jenis</label>
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> --}}
                                </div>
                                <input type="text" id="jenis" name="jenis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    >
                            </div>
                            <div class="mb-6">
                                <label for="harga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga (Rp)</label>
                                <input type="number" id="harga" name="harga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="contoh: 15000000" required
                                    >
                            </div>
                            <div class="mb-6">
                                <label for="peserta"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Peserta Kelompok</label>
                                <input type="number" id="peserta" name="peserta"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="contoh: 7" required
                                    >
                            </div>
                        </div>
                        <div class="flex-1 px-3">
                            <div class="mb-6">
                                <label for="kode"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kode Kelompok</label>
                                <input id="kode" name="kode" type="disbale"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    readonly
                                    >
                            </div>
                            <div class="mb-6">
                                <label for="harga_per_orang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Harga Per Orang (Rp)</label>
                                <input type="text" id="harga_per_orang" name="harga_per_orang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    >
                            </div>
                            <div class="mb-6">
                                <label for="ket"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keterangan</label>
                                <textarea rows="6" type="text" id="ket" name="ket"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                ></textarea>
                            </div>
        
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="btn-edit-visit" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                        Data</button>
                    <button data-modal-toggle="modal-edit-visit" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Batal</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
