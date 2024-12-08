<x-client-app>
        <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
            <div class="min-h-screen">
                <section>
                    <form id="searchBooksForm" action="https://perpustakaan.jakarta.go.id/book" method="GET">
                        <input type="hidden" name="locations" value="">
                        <input type="hidden" name="subjects" value="">
                        <input type="hidden" name="categories" value="">

                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-base lg:text-xl font-bold">Semua Buku</h1>
                                <p class="text-gray-600 text-sm hidden lg:block">Tingkatkan literasi membacamu hari ini!
                                </p>
                            </div>
                        </div>

                        <div class="my-4 lg:my-4">
                            <div class="flex justify-between gap-2 lg:gap-4">
                                <div class="w-full">
                                    <label for="books-search"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <input name="keyword" type="search" id="books-search"
                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                                            value="" placeholder="Cari Judul/Penulis/Tahun Terbit">
                                    </div>
                                </div>

                                <div x-data="{ filterLibraryLocationModal: false }" x-cloak="">
                                    <div @click="filterLibraryLocationModal = true"
                                        class="flex items-center cursor-pointer gap-2 text-primary-500 rounded-lg text-sm p-2 lg:px-6 lg:py-2 border border-primary-500 hover:bg-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z">
                                            </path>
                                        </svg>
                                        <span class="hidden lg:block font-medium">Filter</span>
                                    </div>
                                    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title"
                                        role="dialog" aria-modal="true" x-show="filterLibraryLocationModal">
                                        <div
                                            class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                aria-hidden="true"></div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                aria-hidden="true">​</span>
                                            <div @click.outside="filterLibraryLocationModal = false"
                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full lg:max-w-4xl">

                                                <div class="bg-white p-4">
                                                    <div class="mb-1">
                                                        <div
                                                            class="flex items-center justify-end font-medium text-sm lg:text-base">
                                                            <div @click="filterLibraryLocationModal = false">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="cursor-pointer h-4 w-4" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-4 gap-y-2">
                                                        <div>
                                                            <div class="my-4">
                                                                <div class="font-medium text-sm lg:text-base">
                                                                    Saring Kategori
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="grid grid-rows-4 grid-flow-col gap-y-1.5 gap-x-4">
                                                                <div class="flex items-center">
                                                                    <input id="category0" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="10">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category0"
                                                                            class="text-gray-700">Koleksi Anak 0-6
                                                                            Tahun</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="category1" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="20">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category1"
                                                                            class="text-gray-700">Koleksi Anak 10-12
                                                                            Tahun</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="category2" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="19">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category2"
                                                                            class="text-gray-700">Koleksi Anak 7-9
                                                                            Tahun</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="category3" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="8">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category3"
                                                                            class="text-gray-700">Koleksi
                                                                            Referensi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="category4" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="7">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category4"
                                                                            class="text-gray-700">Koleksi Umum</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input id="category5" type="checkbox"
                                                                        name="category_filter"
                                                                        onchange="setBookFilterByCategoryId(this.name)"
                                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                        value="13">
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="category5"
                                                                            class="text-gray-700">Pelajaran
                                                                            Sekolah</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <div class="my-4">
                                                                <div class="font-medium text-sm lg:text-base">
                                                                    Saring Lokasi
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-col space-y-1">
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location0" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="6">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location0"
                                                                            class="text-gray-700">Perpustakaan Jakarta -
                                                                            Cikini</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location1" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="8">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location1"
                                                                            class="text-gray-700">Perpustakaan Jakarta -
                                                                            PDS HB Jassin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location2" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="11">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location2"
                                                                            class="text-gray-700">Perpustakaan Jakarta
                                                                            Barat - Tanjung Duren</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location3" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="12">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location3"
                                                                            class="text-gray-700">Perpustakaan Jakarta
                                                                            Timur - Jatinegara</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location4" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="13">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location4"
                                                                            class="text-gray-700">Perpustakaan Jakarta
                                                                            Utara - Koja</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location5" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="14">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location5"
                                                                            class="text-gray-700">Perpustakaan Jakarta
                                                                            Pusat - Petojo Enclek</label>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input id="location6" type="checkbox"
                                                                            name="location_filter"
                                                                            onchange="setBookFilterByLocationId(this.name)"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 rounded"
                                                                            value="15">
                                                                    </div>
                                                                    <div class="ml-3 text-xs lg:text-sm">
                                                                        <label for="location6"
                                                                            class="text-gray-700">Perpustakaan Jakarta
                                                                            Selatan - Gandaria Tengah</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <div class="my-4">
                                                                <div class="font-medium text-sm lg:text-base">
                                                                    Saring Bahasa
                                                                </div>
                                                            </div>
                                                            <label for="language"></label>
                                                            <select id="language" name="language"
                                                                class="form-select p-2 w-full border-2 border-gray-100 bg-gray-100 pl-6 rounded-lg text-xs lg:text-sm">
                                                                <option value="">Semua Bahasa</option>
                                                                <option value="ind">Indonesia</option>
                                                                <option value="dut">Belanda</option>
                                                                <option value="eng">Inggris</option>
                                                                <option value="fre">Perancis</option>
                                                                <option value="ger">Jerman</option>
                                                                <option value="spa">Spanyol</option>
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <div class="my-4">
                                                                <div class="font-medium text-sm lg:text-base">
                                                                    Urut Berdasarkan
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label for="sort"></label>
                                                                <select id="sort" name="sort"
                                                                    class="form-select p-2 w-full border-2 border-gray-100 bg-gray-100 pl-6 rounded-lg text-xs lg:text-sm">
                                                                    <option value="latest" selected="">
                                                                        Terbaru
                                                                    </option>
                                                                    <option value="oldest">
                                                                        Terlama
                                                                    </option>
                                                                    <option value="title_asc">
                                                                        Judul A-Z
                                                                    </option>
                                                                    <option value="title_desc">
                                                                        Judul Z-A
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex flex-nowrap items-center justify-center gap-2 bg-gray-50 px-4 py-3">
                                                    <button type="submit"
                                                        class="w-full flex justify-center py-2 px-3 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                                        Terapkan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-4">
                            <div class="flex items-center flex-wrap gap-2 lg:gap-3 text-sm">
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Kelas VII
                                </a>
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Kelas VIII
                                </a>
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Kelas IX
                                </a>
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Novel
                                </a>
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Inspirasi
                                </a>
                                <a href=""
                                    class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500  hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                    Sejarah
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mt-4 lg:mt-6 mb-8">

                            <div class="flex flex-col gap-4">
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865018">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288146.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Adab di atas ilmu 2">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Adab / Ilmu
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Adab di atas ilmu 2</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Imam Nawawi
                                                    (Pengarang) ; Rusdianto (Penerjemah) ; Muhammad Syadi Musthafa
                                                    (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865017">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288141.jpeg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Homo sacer">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Filsafat
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Homo sacer</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Giorgio
                                                    Agamben (Pengarang) ; Stephanus Aswar Herinato (Penerjemah) ;
                                                    Muhammad Ali Fakih (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865016">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288137.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Masih :  karena cinta selalu berkisah">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Novel
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Masih : karena cinta selalu berkisah</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Novelia Indri
                                                    S. (Pengarang) ; Abdul Latif (Penyunting) ; Osmanovski (Ilustrator)
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865015">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288132.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Aneka kreasi lipatan uang untuk mahar :  jadikan pernikahan Anda paling berkesan dan tidak terlupakan sepanjang masa">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Kerajinan tangan
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Aneka kreasi lipatan uang untuk mahar : jadikan pernikahan Anda
                                                    paling berkesan dan tidak terlupakan sepanjang masa</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Ayu Wulan
                                                    Friyani (Pengarang) ; Endah Kemala (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865014">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288127.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Tumapel :  cikal bakal majapahit">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Tumapel : cikal bakal majapahit</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Henricus
                                                    Supriyanto (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865013">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288122.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Parenting Islami :  membentuk anak berkarakter">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Parenting Islami / Mengasuh anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Parenting Islami : membentuk anak berkarakter</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Ridwan
                                                    Abdullah Sani (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865012">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288117.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Bolon :  Komik Lieur">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Komik
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Bolon : Komik Lieur</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Sagus
                                                    (Pengarang) ; Bayu (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865011">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288112.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="And i say it's all right">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Cerita bergambar
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    And i say it's all right</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Helloditta
                                                    (Pengarang) ; Ardian (Penyunting) ; Helloditta (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-col gap-4">
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865010">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288107.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="KUHP 2023 Kitab Undang - Undang Hukum Pidana :  Undang - Undang RI No.1 Tahun 2023">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Hukum Pidana
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    KUHP 2023 Kitab Undang - Undang Hukum Pidana : Undang - Undang RI
                                                    No.1 Tahun 2023</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Redaksi Sinar
                                                    Grafika (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865009">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288106.jpeg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Batu-batu kelaparan">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Novel
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Batu-batu kelaparan</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Rabindranath
                                                    Tagore (Pengarang) ; Sovia Veronica Purba (Penerjemah) ; Addin
                                                    Negara (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865008">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288104.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Hidup begitu indah dan hanya itu yang kita punya">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Kumpulan tulisan
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Hidup begitu indah dan hanya itu yang kita punya</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Dea Anugrah
                                                    (Pengarang) ; Ipank Pamungkas (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865007">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288102.jpeg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Metodologi studi Islam :  konsep dan diskursus baru dalam kajian Islam kontempoter">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Penelitian Islam
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Metodologi studi Islam : konsep dan diskursus baru dalam kajian
                                                    Islam kontempoter</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Raha Bistara
                                                    (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865006">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288097.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Invertensi kelompok dalam psikologi :  teori dan teknik">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Psikologi
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Invertensi kelompok dalam psikologi : teori dan teknik</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Zainal Anwar
                                                    (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865005">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288094.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Metode penetapan hukum Islam :  membangun madzhab fiqih kontemporer di Indonesia">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Hukum Islam
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Metode penetapan hukum Islam : membangun madzhab fiqih kontemporer
                                                    di Indonesia</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Kasuwi Saiban
                                                    (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865004">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288091.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Ulul azmi">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Ulul azmi</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Isthi P.
                                                    Rahayu (Pengarang) ; Nurhadiansyah (Penyunting) ; Arya Widyantoro
                                                    (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865003">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288089.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Kuda nil suka ngemil = The hungry hippo">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Kuda nil suka ngemil = The hungry hippo</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Rasul Arasy
                                                    (Pengarang) ; Arya Widyantoro (Penerjemah) ; Aaliyah Haider
                                                    (Ilustrator) ; Noor H. Dee (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-col gap-4">
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865002">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288084.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Ayo, waktunya mandi! :  Membantu anak mengenali dan mencegah bahaya saat di transportasi umum">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Ayo, waktunya mandi! : Membantu anak mengenali dan mencegah bahaya
                                                    saat di transportasi umum</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Mutiara Eff
                                                    (Pengarang) ; Afa Tazkia (Ilustrator) ; Ana D. Itsna Pebriana
                                                    (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865001">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288079.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Pengantar studi keamanan">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Kerjasama internasional
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Pengantar studi keamanan</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Jerry Indrawan
                                                    (Pengarang) ; Efriza (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000865000">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288077.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="BPJS :  bukan pasien jantung spesial">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Novel
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    BPJS : bukan pasien jantung spesial</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Giardanila
                                                    (Pengarang) ; Kirana (Penyunting) ; @coverluv (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864999">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288072.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Mengenal pribadi nabi lebih dekat lagi">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">





                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Kisah Nabi
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Mengenal pribadi nabi lebih dekat lagi</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Syadi Wahid
                                                    Quthnah (Pengarang) ; Moh. Fathor Rois (Penerjemah) ; Baba Mohammad
                                                    Raka SF (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864998">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288069.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Aku lulus toilet training :  Pipis dan pup di celana itu tidak enak">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">



                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Aku lulus toilet training : Pipis dan pup di celana itu tidak enak
                                                </h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Kezia GC
                                                    (Pengarang) ; Ana D. Itsna Pebriana (Penyunting) ; Rifqah Mufidah
                                                    (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864997">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288066.jpeg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Memahami diri sendiri dan orang lain">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Psikologi dasar
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Memahami diri sendiri dan orang lain</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Alfred Adler
                                                    (Pengarang) ; Aquarina Kharisma Sari (Penerjemah) ; R. Edink
                                                    (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864996">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288062.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Anak muslim pandai berdoa :  Membantu anak mengenali dan mencegah bahaya saat di transportasi umum">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Anak muslim pandai berdoa : Membantu anak mengenali dan mencegah
                                                    bahaya saat di transportasi umum</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Laksmi
                                                    manohara (Pengarang) ; Muhamad Ramdani (Ilustrator) ; Risma Dewi
                                                    (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864995">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288057.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Ayah, ibu, ceritakan tentang Allah swt.">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Ayah, ibu, ceritakan tentang Allah swt.</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Beby Haryanti
                                                    Dewi (Pengarang) ; Riannon Unicorn (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-col gap-4">
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864994">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288054.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Aku ingin pup = I need to poop :  Membantu anak mengenali dan mencegah bahaya saat di transportasi umum">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Aku ingin pup = I need to poop : Membantu anak mengenali dan
                                                    mencegah bahaya saat di transportasi umum</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Benny Rhamdani
                                                    (Pengarang) ; Muhamad Ramdani (Ilustrator) ; Prisca Primasari
                                                    (Penerjemah)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864993">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288049.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Aku hebat dan berbakat">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Fiksi
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Aku hebat dan berbakat</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Siregar,
                                                    Zhizhi (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864992">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288047.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Mempermudah Urusan Jual Beli :  Seri Amalan Masuk Surga">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Jual Beli
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Mempermudah Urusan Jual Beli : Seri Amalan Masuk Surga</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Nurul Ikoma
                                                    (Pengarang) ; Tim Inner Child (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864991">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288042.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Pedoman praktis legal drafting :  panduan praktis merancang peraturan perundang-undangan secara jelas dan efektif">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Rencana Undang/undang
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Pedoman praktis legal drafting : panduan praktis merancang peraturan
                                                    perundang-undangan secara jelas dan efektif</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">A.A. Oka
                                                    Mahendra (Pengarang)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864990">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288037.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Warna di atas kertas">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">


                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Novel
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Warna di atas kertas</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Fitria NA
                                                    (Pengarang) ; Puput Alvia (Penyunting) ; @fitrndm (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864989">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288034.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Kisah-kisah sunah :  rampai cerita dari Rasulullah saw, dan pelajaran hidup bagi kita hari ini">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">


                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Kisah Islami
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Kisah-kisah sunah : rampai cerita dari Rasulullah saw, dan pelajaran
                                                    hidup bagi kita hari ini</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Ahmad Umar
                                                    Hasyim (Pengarang) ; Abdul Rosyid Shidiq (Penerjemah)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864988">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288029.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Mekanik :  Hobiku Cita-Citaku">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Mekanika
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Mekanik : Hobiku Cita-Citaku</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Cucu
                                                    Nurhasanah (Pengarang) ; Daniel Calvin (Ilustrator)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000864987">
                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288024.jpg"
                                            src="images/no-images.png"
                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full min-h-48 lg:min-h-64 max-h-full -z-10"
                                            alt="Kata ajaib">
                                        <div
                                            class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                            <div class="flex items-center justify-between">

                                            </div>

                                            <div
                                                class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                <div
                                                    class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                    Bacaan anak/anak
                                                </div>
                                                <h1
                                                    class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                    Kata ajaib</h1>
                                                <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Widya Ross
                                                    (Pengarang) ; Manimonki Studios (Ilustrator) ; Noor H.Dee
                                                    (Penyunting)</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <nav role="navigation" aria-label="Pagination Navigation"
                                class="flex items-center justify-between">
                                <div class="flex justify-between flex-1 sm:hidden">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                        « Sebelumnya
                                    </span>

                                    <a href="https://perpustakaan.jakarta.go.id/book?page=2"
                                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                        Selanjutnya »
                                    </a>
                                </div>

                                <div class="hidden sm:flex-1 sm:flex space-x-4 sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700 leading-5">
                                            Menampilkan
                                            <span class="font-medium">1</span>
                                            hingga
                                            <span class="font-medium">32</span>
                                            dari
                                            <span class="font-medium">138489</span>
                                            hasil
                                        </p>
                                    </div>

                                    <div>
                                        <span class="relative z-0 inline-flex shadow-sm rounded-md">

                                            <span aria-disabled="true" aria-label="&amp;laquo; Sebelumnya">
                                                <span
                                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                                    aria-hidden="true">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-orange-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                            </span>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=2"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 2">
                                                2
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=3"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 3">
                                                3
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=4"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 4">
                                                4
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=5"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 5">
                                                5
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=6"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 6">
                                                6
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=7"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 7">
                                                7
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=8"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 8">
                                                8
                                            </a>

                                            <span aria-disabled="true">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">...</span>
                                            </span>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=4327"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 4327">
                                                4327
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=4328"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 4328">
                                                4328
                                            </a>
                                            <a href="https://perpustakaan.jakarta.go.id/book?page=2" rel="next"
                                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                                aria-label="Selanjutnya &amp;raquo;">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </nav>

                        </div>
                    </form>
                </section>
            </div>

        </main>


        <aside
            class="scroll-container hidden lg:flex w-1/6 border-l fixed right-0 top-0 h-screen p-4 overflow-y-auto flex-col space-y-4">

            <div class="">
                <div class="rounded-lg bg-primary-50/50 border border-primary-500 p-3">
                    <div class="flex items-center space-x-2 text-primary-800">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z">
                            </path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-sm font-medium">Info</h3>
                    </div>

                    <div class="mt-2 mb-4 text-sm text-primary-800">
                        Tidak menemukan buku yang kamu cari?
                    </div>

                    <a target="_blank" href=""
                        class="flex items-center justify-center space-x-2 text-white bg-primary-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-200 font-medium rounded-lg text-xs px-3 py-1.5 cursor-pointer transition ease-in-out hover:-translate-y-1 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75">
                            </path>
                        </svg>
                        <span class="line-clamp-1">Hubungi Kami</span>
                    </a>
                </div>
            </div>
                </div>
            </div>
        </aside>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.toast.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/qrcode.js"></script>
    <script src="js/barcode.js"></script>
    <script src="js/compressor.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/lazysizes.min.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/social-share.js"></script>
    <script src="js/party.js"></script>
    <script src="js/heic2any.js"></script>
    <script src="js/custom.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const profilePhoto = '';
            if (profilePhoto) {
                displayHeicImage(profilePhoto, "facePhoto");
            }
        });
    </script>
    <script>
        function mobileAppDownloadInfo() {
            return {
                openMobileAppDownloadLink: false,
                mobileAppDownloadInfo: !getLocalStorageWithExpiration("mobileAppDownloadInfo")?.isUserHasClosedIt,
                closeMobileAppDownloadInfo() {
                    setLocalStorageWithExpiration("mobileAppDownloadInfo", { isUserHasClosedIt: true }, 1);
                    this.mobileAppDownloadInfo = false;
                }
            };
        }
    </script>
</body>
</x-client-app>
