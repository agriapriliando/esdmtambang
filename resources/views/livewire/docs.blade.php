<div class="container">
    <div class="page-inner" x-data="{ formupload: false }">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Menu File Berkas</h3>
                <h6 class="op-7 mb-2">Jumlah Seluruh Berkas :
                    <span class="badge text-bg-primary">
                        {{ $docs->count() }} File</span>
                </h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a wire:navigate href="{{ route('perusahaan') }}" class="btn btn-label-info btn-round me-2">Kelola Perusahaan</a>
                <button x-on:click="formupload = !formupload" class="btn btn-primary btn-round" type="button">
                    <i class="fas fa-plus"></i> Unggah File
                </button>
                <a wire:navigate href="{{ route('berkas') }}" class="btn btn-primary btn-round"><i class="fas fa-sync"></i> Refresh</a>
            </div>
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
                <div class="alert alert-success alert-dismissible fade show position-fixed tengah" role="alert" style="z-index: 1000000">
                    <strong>Berhasil</strong> {{ session('success') }}
                    <div>
                        <button type="button" class="btn-close ms-4" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endsession
        </div>
        <div class="row" x-show="formupload" x-transition class="mt-3" x-on:click.outside="formupload = false">
            <div class="col-12 card card-round">
                <div class="card-body">
                    <form wire:submit.prevent="uploadfile()" x-data="{ jenisunggahan: '0' }">
                        <div class="mb-2">
                            <button x-on:click="formupload = !formupload" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                            <h5>Menu Unggah File</h5>
                        </div>
                        <div class="mb-2">
                            <label for="perusahaan">Pilih Perusahaan</label>
                            <div wire:ignore>
                                <select name="perusahaan" id="perusahaan" class="form-select @error('company_id') is-invalid @enderror" style="width: 100% !important;" required>
                                    <option value="">=== Cari Perusahaan ===</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('company_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jenisunggahan">Jenis Unggahan</label>
                            <select wire:model="jenisunggahan" x-on:change="jenisunggahan = $event.target.value" name="jenisunggahan" class="form-select" required>
                                <option value="0">File / Berkas</option>
                                <option value="1">Link Google Drive</option>
                            </select>
                            <small class="text-muted">
                                Silahkan Gunakan Jenis Unggahan Link Google Drive jika file melebihi
                                ukuran maksimal 10 MB per file
                            </small>
                        </div>
                        <div x-show="jenisunggahan === '0'" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="mb-2" x-data="{ files: null, filess: false }">
                                <label for="file-upload">Pilih File</label>
                                <input wire:model.live="file" type="file" class="form-control" id="file-upload" enctype="multipart/form-data" multiple
                                    x-on:change="files = Object.values($event.target.files), filess = true">
                                <span :class="filess ? 'd-block text-bg-success rounded py-2 ps-3 mt-1' : 'd-none'"
                                    x-html="files ?
            files.map(file => '+ '+file.name).join('</br> ')
            : 'Pilh File'"></span>
                                <small>
                                    Format File : pdf,doc,docx,xls,xlsx,jpg,jpeg,png <br>
                                    Maksimal 10 MB per file<br>
                                </small>
                            </div>
                            <div wire:loading wire:target="file" class="text-bg-primary text-center p-1 mb-1 rounded">Harap Tunggu,
                                Sedang
                                Memeriksa File...
                            </div>
                            <div x-show="uploading" class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" :style="{ width: progress + '%' }"></div>
                            </div>
                        </div>
                        <div x-show="jenisunggahan === '1'">
                            <div class="mb-2">
                                <label for="title_link">Nama Dokumen</label>
                                <input wire:model.live.debounce.350ms="title_link" type="text" class="form-control @error('title_link') is-invalid @enderror" id="title_link">
                                @error('title_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="link">Link Google Drive</label>
                                <input wire:model.live.debounce.350ms="file_link" type="text" class="form-control @error('file_link') is-invalid @enderror" id="link">
                                @error('file_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="text-muted">Contoh : https://drive.google.com/file/d/</small>
                            </div>
                        </div>
                        <div class="my-2">
                            <select wire:model="visibilitas" name="visibilitas" class="form-select">
                                <option value="0">Akses Tertutup</option>
                                <option value="1">Akses Terbuka</option>
                            </select>
                            <small class="text-muted">
                                Tertutup : Hanya bisa diakses oleh Admin/ Operator <br>
                                Terbuka : Bisa diakses tanpa harus Login
                            </small>
                        </div>
                        @if ($file || ($file_link && $title_link))
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Unggah File</button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-round">
                    <div class="card-header" x-data="{ panduan: false }">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Daftar File Berkas</div>
                            <div class="card-tools d-flex">
                                <button x-on:click="panduan = !panduan" class="btn btn-success btn-sm ms-2">
                                    <i class="fas fa-question"></i> Panduan
                                </button>
                                <input wire:model.live.debounce.350ms="search" type="text" class="form-control" placeholder="Cari File...">
                            </div>
                        </div>
                        <div x-show="panduan" x-transition x-on:click.outside="panduan = false">
                            <hr>
                            <h4>Panduan :</h4>
                            <p>
                                File yang diunggah harus berformat ekstensi :
                                pdf,doc,docx,xls,xlsx,jpg,jpeg,png,zip,rar <br>
                                File maksimal 10 MB, lebih dari itu, silahkan gunakan Google Drive, lalu
                                sertakan link
                            </p>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show mt-2 d-none" role="alert">
                            <strong>Berhasil</strong> File Berhasil Diunggah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama Berkas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docs as $doc)
                                        <tr>
                                            <td>
                                                <div class="float-end position-relative" x-data="{ hapus: false }">
                                                    <a target="_blank" href="{{ route('download', $doc->id) }}">
                                                        <span class="btn btn-primary">
                                                            <i class="fa fa-download"> Unduh</i>
                                                        </span>
                                                    </a>
                                                    <button x-on:click="hapus = !hapus" class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus</button>
                                                    <div x-show="hapus" x-transition x-on:click.outside="hapus = false" class="position-absolute top-0 end-0">
                                                        <div class="d-flex">
                                                            <div @click="hapus = false" wire:click="delete({{ $doc->id }})" class="bg-warning rounded hover p-2">Ya, Hapus</div> |
                                                            <div @click="hapus = false" class="bg-warning rounded hover p-2">Batal</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{ $doc->title }}
                                                <div class="mt-2">
                                                    <span class="badge text-bg-success ps-2">
                                                        {{ $doc->company->name_company }}
                                                    </span>
                                                    <span class="badge text-bg-warning ps-2">{{ $doc->type }} | {{ round($doc->size / 1024) }} KB
                                                    </span> <br>
                                                    <span class="badge text-bg-warning ps-2">
                                                        Added by {{ $doc->upload_by }} - {{ Carbon\Carbon::parse($doc->created_at)->translatedFormat('d/m/Y H:i') }} Wib
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mx-4 mt-2">
                                {{ $docs->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#perusahaan').select2();
            $('#perusahaan').on('change', function(e) {
                var data = $('#perusahaan').select2("val");
                @this.set('company_id', data);
            });
        });
    </script>
@endpush
