<div class="container">
    <div class="page-inner" x-data="{ formperusahaan: false }">
        <div class="row">
            <div class="col-12">
                <div class="card card-round p-3">
                    <div class="card-header" x-data="{ panduan: false }">
                        <div class="" x-data
                            @notify.window="
                        setTimeout(function() {
                            bootstrap.Toast.getOrCreateInstance(document.getElementById('liveToast')).show();
                            document.getElementById('pesan').innerHTML = $event.detail.message;
                            console.log($event.detail.message);
                        }, 1000);
                        ">
                            <div class="toast-container position-fixed top-0 end-0">
                                <div id="liveToast" class="toast align-items-center text-bg-success border-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="me-auto">Berhasil</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        <strong class="me-auto" id="pesan"></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <div class="d-flex">
                                    <button x-on:click="panduan = !panduan" class="btn btn-success btn-round me-2">
                                        <i class="fas fa-question"></i>
                                    </button>
                                    <a @click="$dispatch('notify', { message: 'Refresh SK Berhasil' })" wire:loading.attr="disabled" class="btn btn-primary btn-round" wire:navigate
                                        href="{{ url('nomorsk/' . $id) }}">
                                        <i class="bi bi-arrow-repeat"></i>Refresh</a>
                                </div>
                            </div>
                            <div class="card-title">Edit Surat Keputusan (SK)
                                <a class="btn text-bg-primary btn-sm rounded" wire:navigate href="{{ url('perusahaan/' . $company_id) }}">
                                    <i class="fas fa-arrow-left"></i></a>
                            </div>
                        </div>
                        <div x-show="panduan" x-transition x-on:click.outside="panduan = false">
                            <hr>
                            <h4>Panduan :</h4>
                            <p>
                                Seluruh Data Perusahaan Diinput secara manual oleh Operator/Admin<br>
                            </p>
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
                            <div class="alert alert-success alert-dismissible fade show position-fixed tengah" role="alert">
                                <strong>Berhasil</strong> {{ session('success') }}
                                <div>
                                    <button type="button" class="btn-close ms-4" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endsession
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateSk()">
                            <div class="row bg-white">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="name_company">Nama Perusahaan</label>
                                        <input type="text" id="name_company" class="form-control @error('name_company') is-invalid @enderror" value="{{ $name_company }}" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label for="nomor">Nomor SK</label>
                                        <input type="text" id="nomor" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor">
                                    </div>
                                    <div class="mb-2">
                                        <label for="lokasi">Lokasi Operasional</label>
                                        <input type="text" id="lokasi" class="form-control mb-1" value="{{ $provinsi }}" disabled>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text" id="kabupaten">Kabupaten</span>
                                            <input wire:model.live="kabupaten" class="form-control" list="kabupatens" id="kabupaten" placeholder="Pilih Kabupaten">
                                            <datalist id="kabupatens">
                                                <option>Pilih Kabupaten</option>
                                                @foreach ($kabupatens as $kab)
                                                    <option value="{{ $kab->name_region }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                        @error('kabupaten')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <div class="input-group mb-1">
                                            <span class="input-group-text" id="kecamatan">Kecamatan</span>
                                            <input wire:model.live="kecamatan" class="form-control" list="kecamatans" id="kecamatan" placeholder="Pilih kecamatan">
                                            <datalist id="kecamatans">
                                                <option>Pilih kecamatan</option>
                                                @if ($kabupaten)
                                                    @foreach ($kecamatans as $kab)
                                                        <option data-id="{{ $kab->id }}" value="{{ $kab->name_region }}">
                                                    @endforeach
                                                @endif
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Kelurahan/Desa</span>
                                                <input type="text" class="form-control" placeholder="Kelurahan / Desa">
                                            </div>
                                            @error('kelurahan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2 d-flex">
                                        <div>
                                            <label for="tgl_mulai">Tanggal Mulai</label>
                                            <div class="d-flex">
                                                <input style="width: 200px" type="date" id="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" wire:model="tgl_mulai">
                                            </div>
                                            @error('tgl_mulai')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="tgl_selesai">Tanggal Selesai</label>
                                            <div class="d-flex">
                                                <input style="width: 200px" type="date" id="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                    wire:model="tgl_selesai">
                                            </div>
                                            @error('tgl_selesai')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="luasha">Luas (HA)</label>
                                        <input style="width: 120px" type="number" inputmode="numeric" id="luasha" class="form-control @error('luasha') is-invalid @enderror"
                                            wire:model="luasha">
                                        @error('luasha')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamat_sk">Alamat Lengkap sesuai SK</label>
                                        <textarea id="alamat_sk" rows="3" class="form-control" wire:model="alamat_sk"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-3" type="submit">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
