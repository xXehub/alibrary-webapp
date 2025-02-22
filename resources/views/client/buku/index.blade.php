<x-client-app>
    <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
        <div class="min-h-screen">
            <section>
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-base lg:text-xl font-bold">Daftar Koleksi Buku</h1>
                        <p class="text-gray-600 text-sm hidden lg:block">Semua buku yang tersedia ditampilkan
                            disini!</p>
                    </div>
                </div>

                <div class="my-4 lg:my-4">
                    <div class="flex justify-between gap-2 lg:gap-4">
                        <div class="w-full">
                            <label for="books-search" class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <form action="{{ route('bukuClient.index') }}" method="GET">
                                    <input name="keyword" type="search" id="books-search"
                                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                                        value="{{ request('keyword') }}" placeholder="Cari Judul/Penulis/Tahun Terbit">
                                </form>
                            </div>
                        </div>


                        <div x-data="{ filterLibraryLocationModal: false, selectedSort: 'latest' }">
                            <!-- Tombol untuk membuka modal -->
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

                            <!-- Modal untuk Filter -->
                            <div x-data="{ selectedSort: 'latest', selectedGenre: '' }">
                                <div class="fixed z-50 inset-0 overflow-y-auto" x-show="filterLibraryLocationModal"
                                    x-cloak>
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
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Filter Urutan -->
                                                <div class="my-4">
                                                    <div class="font-medium text-sm lg:text-base">Urut Berdasarkan</div>
                                                    <select id="sort" name="sort" x-model="selectedSort"
                                                        class="form-select p-2 w-full border-2 border-gray-100 bg-gray-100 pl-6 rounded-lg text-xs lg:text-sm">
                                                        <option value="latest" selected>Terbaru</option>
                                                        <option value="oldest">Terlama</option>
                                                    </select>
                                                </div>

                                                <!-- Filter Genre -->
                                                <div class="my-4">
                                                    <div class="font-medium text-sm lg:text-base">Filter Berdasarkan
                                                        Genre</div>
                                                    <select id="genre" name="genre" x-model="selectedGenre"
                                                        class="form-select p-2 w-full border-2 border-gray-100 bg-gray-100 pl-6 rounded-lg text-xs lg:text-sm">
                                                        <option value="">Semua Genre</option>
                                                        <!-- Loop through genres -->
                                                        @foreach ($genres as $genre)
                                                            <option value="{{ $genre->id }}">{{ $genre->nama_genre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div
                                                class="flex flex-nowrap items-center justify-center gap-2 bg-gray-50 px-4 py-3">
                                                <button type="button"
                                                    @click="window.location.href = '/buku?sort=' + selectedSort + '&genre=' + selectedGenre"
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
                </div>

                <div class="my-4">
                    <div class="flex items-center flex-wrap gap-2 lg:gap-3 text-sm">
                        @foreach ($genres as $genre)
                            <a href="{{ route('bukuClient.filterByGenre', $genre->id) }}"
                                class="rounded-lg py-1.5 px-3 bg-gray-50 text-gray-500 hover:bg-orange-50 hover:text-orange-500 border hover:border-orange-500">
                                {{ $genre->nama_genre }}
                            </a>
                        @endforeach

                    </div>
                </div>


                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mt-4 lg:mt-6 mb-8">
                    @foreach ($bukus as $buku)
                        <div class="flex flex-col gap-4">
                            <a href="{{ route('clientBuku.show', $buku->id) }}">
                                <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                    <img data-src="{{ asset('storage/buku/' . $buku->gambar_buku) }}"
                                        class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                        alt="{{ $buku->title }}">
                                    <div
                                        class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70 p-3 flex flex-col justify-between">
                                        <div class="flex items-center justify-between"></div>
                                        <div
                                            class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                            <div
                                                class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                {{ $buku->genre->nama_genre ?? 'Unknown Genre' }}
                                            </div>
                                            <h1
                                                class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                {{ $buku->title }}
                                            </h1>
                                            <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">
                                                {{ $buku->penulis->nama_author ?? 'Unknown Author' }}
                                                {{ $buku->penerbit->nama_penerbit ?? 'Unknown Publisher' }}
                                            </h3>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <nav role="navigation" aria-label="Pagination Navigation"
                        class="flex items-center justify-between">
                        <div class="flex justify-between flex-1 sm:hidden">
                            @if ($bukus->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    « Sebelumnya
                                </span>
                            @else
                                <a href="{{ $bukus->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Selanjutnya »
                                </a>
                            @endif
                        </div>
                        <div class="hidden sm:flex-1 sm:flex space-x-4 sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700 leading-5">
                                    Menampilkan <span class="font-medium">{{ $bukus->firstItem() }}</span> hingga
                                    <span class="font-medium">{{ $bukus->lastItem() }}</span> dari <span
                                        class="font-medium">{{ $bukus->total() }}</span> hasil
                                </p>
                            </div>

                            <div>
                                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                    <!-- Previous Page -->
                                    @if ($bukus->onFirstPage())
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
                                    @else
                                        <a href="{{ $bukus->previousPageUrl() }}"
                                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endif

                                    <!-- Page Numbers -->
                                    @for ($page = 1; $page <= $bukus->lastPage(); $page++)
                                        @if ($page == $bukus->currentPage())
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-orange-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                            </span>
                                        @else
                                            <a href="{{ $bukus->url($page) }}"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page {{ $page }}">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endfor

                                    <!-- Next Page -->
                                    @if ($bukus->hasMorePages())
                                        <a href="{{ $bukus->nextPageUrl() }}" rel="next"
                                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @else
                                        <span
                                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 cursor-default">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
    </main>
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
                    setLocalStorageWithExpiration("mobileAppDownloadInfo", {
                        isUserHasClosedIt: true
                    }, 1);
                    this.mobileAppDownloadInfo = false;
                }
            };
        }
    </script>
    </body>
</x-client-app>
