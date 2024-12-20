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
                                    <a @click="$dispatch('notify', { message: 'Refresh Profil Perubahan' })" wire:loading.attr="disabled" class="btn btn-primary btn-round" wire:navigate
                                        href="{{ url('perusahaan/' . $id) }}">
                                        <i class="bi bi-arrow-repeat"></i>Refresh</a>
                                </div>
                            </div>
                            <div class="card-title">Edit Profil Perusahaan
                                <a class="btn text-bg-primary btn-sm rounded" wire:navigate href="{{ url('perusahaan/') }}">
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
                        <form wire:submit.prevent="update()">
                            <div class="row bg-white">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="name_company">Nama Perusahaan</label>
                                        <input type="text" id="name_company" class="form-control @error('name_company') is-invalid @enderror" wire:model="name_company">
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
                                        <div class="d-flex">
                                            <input style="width: 200px" type="text" id="kontak" class="form-control @error('kontak') is-invalid @enderror" wire:model="kontak">
                                        </div>
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
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="card-body" x-data="{ add: false, list: false }">
                        <h5>Daftar Surat Keputusan
                            <button @click="add = !add" class="btn btn-primary btn-sm float-end mx-1" type="button"><i class="fas fa-plus"></i> Tambah SK</button>
                            <button @click="list = !list" class="btn btn-primary btn-sm float-end mx-1 {{ $nomorsks->count() == 0 ? 'd-none' : '' }}" type="button"><i class="fas fa-plus"></i>
                                Lihat SK</button>
                        </h5>
                        <div x-show="add" @click.outside="add = false" x-transition>
                            <hr>
                            <form wire:submit.prevent="addnomorsk()">
                                <div class="mb-2">
                                    <label for="nomor">Masukan Nomor SK</label>
                                    <input type="text" id="nomor" class="form-control @error('nomor') is-invalid @enderror" wire:model.live="nomor" required>
                                    @error('nomor')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button @click="add = false" class="btn btn-primary" type="submit" @error('nomor') disabled @enderror>Simpan Nomor SK</button>
                            </form>
                        </div>
                        <div class="list-group mt-4" x-show="list" @click.outside="list = false" x-transition>
                            @foreach ($nomorsks as $n)
                                @php
                                    $n['tahapan'] = App\Models\Tahapan::where('id', $n->tahapan_id)->first();
                                @endphp
                                <div class="list-group-item list-group-item-action" x-data="{ hapus: false }">
                                    <div class="pt-3">
                                        {{ $loop->iteration }}. Nomor SK : {{ $n->nomor }}
                                    </div>
                                    <span class="badge">
                                        <a wire:navigate href="{{ url('nomorsk/' . $n->id) }}"><i class="fas fa-edit"></i> Edit</a> <br>
                                        <span @click="hapus = !hapus" @click.outside="hapus = false" class="badge text-bg-danger hapus mt-2"><i class="fas fa-trash"></i> Hapus</span>
                                    </span>
                                    <div x-show="hapus" class="position-absolute bg-warning p-2 rounded px-3" style="right: 10px;">
                                        <span class="hapus" wire:click="hapusnomorsk({{ $n->id }})">Ya, hapus</span> | <span class="hapus">Batal</span>
                                    </div>
                                </div>
                                <div class="ms-4 mt-1 mb-4">
                                    @if ($n->tgl_mulai == null)
                                        <a wire:navigate href="{{ url('nomorsk/' . $n->id) }}" class="ms-2"><i class="fas fa-edit"></i> Edit SK untuk Melengkapi Data SK</a>
                                    @else
                                        <span class="badge text-bg-primary"> Masa Berlaku :
                                            {{ date('d-m-Y', strtotime($n->tgl_mulai)) }} s.d.
                                            {{ date('d-m-Y', strtotime($n->tgl_selesai)) }}
                                        </span> <br>
                                        Tahapan IUP : {{ $n['tahapan']['name_tahapan'] }} | Lokasi : {{ $n->kabupaten }}, {{ $n->kecamatan }}, {{ $n->desa }}
                                        <br> Luas (HA) : {{ $n->luasha }} | Alamat sesuai SK : {{ $n->alamat }}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
