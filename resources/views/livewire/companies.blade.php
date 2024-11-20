<div class="container">
    <div class="page-inner" x-data="{ formperusahaan: false }">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Menu Profil Perusahaan</h3>
                <h6 class="op-7 mb-2">Jumlah Perusahaan :
                    <span class="badge text-bg-primary">
                        {{ $companies->count() }} Perusahaan Terdaftar</span>
                </h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a wire:navigate href="{{ route('berkas') }}" class="btn btn-label-info btn-round me-2">Kelola File Berkas</a>
                <button x-on:click="formperusahaan = !formperusahaan" class="btn btn-primary btn-round" type="button">
                    <i class="fas fa-plus"></i> Tambah Perusahaan
                </button>
                <a wire:navigate href="{{ route('perusahaan') }}" class="btn btn-primary btn-round"><i class="fas fa-sync"></i> Refresh</a>
            </div>
        </div>
        <div class="row" x-show="formperusahaan" x-transition class="mt-3" x-on:click.outside="formperusahaan = false">
            <div class="col-12 card card-round">
                <style>
                    .tengah {
                        width: 350px;
                        z-index: 9999;
                        bottom: 5%;
                        right: 5%;
                    }

                    .hapus {
                        cursor: pointer !important;
                    }
                </style>
                @session('success')
                    <div class="alert alert-success alert-dismissible fade show position-fixed tengah" role="alert">
                        <strong>Berhasil</strong> {{ session('success') }}
                        <div>
                            <button type="button" class="btn-close ms-4" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endsession
                <div class="card-body">
                    <form wire:submit.prevent="addCompany()">
                        <div class="row bg-white">
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <h5>Menu Tambah Perusahaan</h5>
                                </div>
                                <div class="mb-2">
                                    <label for="name_company">Nama Perusahaan</label>
                                    <input type="text" id="name_company" class="form-control @error('name_company') is-invalid @enderror" wire:model.live.debounce.350ms="name_company">
                                    <small class="text-muted">Tanpa memakai Titik</small>
                                    @error('name_company')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="name_kontak">Nama PIC</label>
                                    <input type="text" id="name_kontak" class="form-control @error('name_kontak') is-invalid @enderror" wire:model="name_kontak">
                                    @error('name_kontak')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="kontak">Kontak PIC</label>
                                    <input style="width: 200px" type="text" id="kontak" class="form-control @error('kontak') is-invalid @enderror" wire:model="kontak">
                                    @error('kontak')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label for="email">Email Perusahaan</label>
                                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="nosk">Catatan / Keterangan
                                        Tambahan</label>
                                    <textarea name="nosk" id="nosk" rows="3" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary mt-3" type="submit">Simpan Perubahan</button>
                                <button x-on:click="formperusahaan = false" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-round">
                    <div class="card-header" x-data="{ panduan: false }">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Daftar Perusahaan</div>
                            <div class="card-tools d-flex">
                                <button x-on:click="panduan = !panduan" class="btn btn-success btn-sm ms-2">
                                    <i class="fas fa-question"></i> Panduan
                                </button>
                                <input wire:model.live.debounce.350ms="search" type="text" class="form-control" placeholder="Cari Perusahaan...">
                            </div>
                        </div>
                        <div x-show="panduan" x-transition x-on:click.outside="panduan = false">
                            <hr>
                            <h4>Panduan :</h4>
                            <p>
                                Seluruh Data Perusahaan Diinput secara manual oleh Operator/Admin<br>
                            </p>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show mt-2 d-none" role="alert">
                            <strong>Berhasil</strong> Perusahaan Berhasil Disimpan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="mx-4 mt-2">
                                {{ $companies->links() }}
                            </div>
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama Perusahaan | Nomor SK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr wire:key="{{ $company->id }}">
                                            <td x-data="{ modaldetail: false, edit: true, hapus: false }">
                                                <div class="float-end">
                                                    <span @click="modaldetail = !modaldetail" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-download"> Detail</i>
                                                    </span>
                                                    <a wire:navigate href="{{ url('perusahaan/' . $company->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"> Edit</i>
                                                    </a>
                                                    <span @click="hapus = !hapus" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"> Hapus</i>
                                                    </span>
                                                </div>
                                                {{ $company->name_company }}
                                                <div class="mt-2">
                                                    <span class="badge text-bg-warning ps-2">
                                                        Berkas : {{ $company->docs->count() }} File | SK : {{ $company->nomorsks->count() }} Nomor
                                                    </span> <br>
                                                    @foreach ($company->nomorsks as $nomorsk)
                                                        @php
                                                            $sisa_tahun = Carbon\Carbon::parse($nomorsk->tgl_selesai)->diffInYears(Carbon\Carbon::now());
                                                        @endphp
                                                        <span class="badge text-bg-warning ps-2" style="text-align: left !important">
                                                            Nomor SK : {{ $nomorsk->nomor }} <br> {{ date('d-m-Y', strtotime($nomorsk->tgl_mulai)) }} s.d.
                                                            {{ date('d-m-Y', strtotime($nomorsk->tgl_selesai)) }}
                                                        </span>
                                                        <span class="badge {{ $nomorsk->tgl_selesai > Carbon\Carbon::now() ? 'text-bg-success' : 'text-bg-danger' }} ps-2">
                                                            {{ $nomorsk->tgl_selesai > Carbon\Carbon::now() ? 'Sisa ' . $sisa_tahun . ' Tahun' : 'SK Kadaluarsa' }}
                                                        </span><br>
                                                    @endforeach
                                                </div>
                                                <div>
                                                    <div x-show="modaldetail" class="overlay"></div>
                                                    <div x-show="modaldetail" x-on:click.outside="modaldetail = false" class="modal-overlay" style="overflow: auto;">
                                                        <div class="row p-4 bg-white">
                                                            <div class="mb-2">
                                                                <button x-on:click="modaldetail = false" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                                                                <h5>Detail Perusahaan</h5>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="name_company">Nama Perusahaan</label>
                                                                    <input type="text" id="name_company" class="form-control" value="{{ $company->name_company }}" disabled>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="name_kontak">Nama PIC</label>
                                                                    <input type="text" id="name_kontak" class="form-control" value="{{ $company->name_kontak }}" disabled>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="kontak">Kontak PIC</label>
                                                                    <div class="d-flex">
                                                                        <input style="width: 200px" type="text" id="kontak" class="form-control @error('kontak') is-invalid @enderror"
                                                                            value="{{ $company->kontak }}" disabled>
                                                                        <div>
                                                                            <a target="_blank" href="https://api.whatsapp.com/send/?phone={{ $company->kontak }}" class="btn btn-success"><i
                                                                                    class="fab fa-whatsapp"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="email">Email Perusahaan</label>
                                                                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $company->email }}"
                                                                        disabled>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="nosk">Catatan / Keterangan
                                                                        Tambahan</label>
                                                                    <textarea name="nosk" id="nosk" rows="3" class="form-control @error('nosk') is-invalid @enderror" value="{{ $company->nosk }}" disabled></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-4">
                                                                <div class="mb-2">
                                                                    <h5>Data Surat Keputusan</h5>
                                                                </div>
                                                                @if ($company->nomorsks->count() > 0)
                                                                    @foreach ($company->nomorsks as $nomorsk)
                                                                        <div class="mb-2">
                                                                            <p class="m-0 fw-bold">Surat Keputusan {{ $loop->iteration }}</p>
                                                                            <div class="d-md-flex mt-1 mb-2">
                                                                                <input type="text" id="nomorsk" class="form-control me-1" value="{{ $nomorsk->nomor }}" disabled>
                                                                                <input style="width: 200px" type="date" class="form-control me-1" value="{{ $nomorsk->tgl_mulai }}" disabled>
                                                                                <input style="width: 200px" type="date" class="form-control me-1" value="{{ $nomorsk->tgl_selesai }}" disabled>
                                                                            </div>
                                                                            <p class="m-0">Lokasi Sesuai SK</p>
                                                                            <div class="mb-2 d-md-flex">
                                                                                <input type="text" id="email" class="form-control m-1" value="Kalimantan Tengah" disabled>
                                                                                <input type="text" id="email" class="form-control m-1" value="Kab. Kutai Timur" disabled>
                                                                                <input type="text" id="email" class="form-control m-1" value="" disabled>
                                                                            </div>
                                                                            <div class="mb-2 d-md-flex">
                                                                                <div class="mb-2">
                                                                                    <label for="luasha">Luas HA</label>
                                                                                    <input style="width: 200px" type="text" id="email" class="form-control m-1" value="3040" disabled>
                                                                                </div>
                                                                                <div class="mb-2">
                                                                                    <label for="tahapan">Tahapan IUP</label>
                                                                                    @php
                                                                                        $nomorsk['tahapan'] = App\Models\Tahapan::where('id', $nomorsk->tahapan_id)->first();
                                                                                    @endphp
                                                                                    <input style="width: 200px" type="text" id="email" class="form-control m-1"
                                                                                        value="{{ $nomorsk['tahapan']['name_tahapan'] }}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <label for="alamat">Alamat sesuai SK</label>
                                                                                <textarea name="alamat" id="alamat" rows="2" class="form-control" disabled></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    @endforeach
                                                                @else
                                                                    <div class="mb-2">
                                                                        <p class="m-0">SK Belum Tersedia, Silahkan Tambahkan</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div x-show="hapus" class="overlay"></div>
                                                    <div x-show="hapus" x-on:click.outside="hapus = false" class="modal-hapus text-bg-warning text-center p-4">
                                                        <p>Yakin ingin hapus Data Perusahaan ini? Setelah
                                                            terhapus, data tidak bisa dipulihkan/ dikembalikan
                                                        </p>
                                                        <div>
                                                            <button x-click="hapus = false" wire:click.prevent="deleteCompany({{ $company->id }})" type="button" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                                Hapus Data
                                                            </button>
                                                            <button @click="hapus = false" type="button" class="btn btn-sm btn-success">
                                                                Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mx-4 mt-2">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
