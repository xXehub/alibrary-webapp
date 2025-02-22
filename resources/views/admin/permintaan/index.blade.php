<x-app>
<div class="page-body">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Manajemen Permintaan User
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="{{ route('permintaan.excel') }}" class="btn">
                                    Cetak
                                </a>
                            </span>
                            <button href="" class="btn btn-primary d-none d-sm-inline-block" disabled
                                readonly>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah Permintaan
                            </button>
                            <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-tambahData" aria-label="Tambah Produk">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="row row-cards">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    {{-- Show --}}
                                    <div class="mx-2 d-inline-block">
                                        <select id="pageLength" class="form-control form-control-sm"
                                            style="width:70px">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    {{-- entries --}}
                                </div>
                                <div class="ms-auto text-muted">
                                    {{-- Search: --}}
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" id="searchInput" class="form-control form-control-sm"
                                            placeholder="Cari Permintaan.." aria-label="Search supplier">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="tablePermintaan">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th style="width: 15%;">Kode</th>
                                        <th style="width: 20%;">Peminjam</th>
                                        <th style="width: 15%;">Tgl Pinjam</th>
                                        <th style="width: 15%;">Tgl Kembali</th>
                                        <th style="width: 15%;">Status</th>
                                        <th class="w-1" style="width: 30%;">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p id="tableInfo" class="m-0 text-muted"></p>
                            <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Permintaan Tracker</h3>
                            <table class="table table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th class="text-end">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tracker as $item)
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        @php
                                                            $percentage =
                                                                $total > 0 ? ($item->jumlah / $total) * 100 : 0;
                                                        @endphp
                                                        <div class="progress-bar bg-primary-lt"
                                                            style="width: {{ $percentage }}%" role="progressbar"
                                                            aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                            aria-valuemax="100"
                                                            aria-label="{{ $percentage }}% Complete">
                                                            <span class="visually-hidden">{{ $percentage }}%
                                                                Complete</span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        @php
                                                            $statusLabels = [
                                                                0 => 'Pending',
                                                                1 => 'Disetujui',
                                                                2 => 'Dipinjam',
                                                                3 => 'Dikembalikan',
                                                                4 => 'Terlambat',
                                                                5 => 'Hilang',
                                                                5 => 'Pengembalian',
                                                                7 => 'Ditolak',
                                                            ];
                                                        @endphp
                                                        {{ $statusLabels[$item->status] ?? 'Unknown' }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="w-1 fw-bold text-end">{{ $item->jumlah }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">Data tracker tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app>