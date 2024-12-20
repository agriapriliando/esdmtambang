@extends('components.layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner" x-data="{ formperusahaan: false }">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Menu Profil Perusahaan</h3>
                    <h6 class="op-7 mb-2">Jumlah Perusahaan :
                        <span class="badge text-bg-primary">
                            225 Terdaftar</span>
                    </h6>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Kelola File Berkas</a>
                    <button x-on:click="formperusahaan = !formperusahaan" class="btn btn-primary btn-round" type="button">
                        <i class="fas fa-plus"></i> Tambah Perusahaan
                    </button>
                    <a href="#" class="btn btn-primary btn-round">Refresh</a>
                </div>
            </div>
            <div class="row" x-show="formperusahaan" x-transition class="mt-3" x-on:click.outside="formperusahaan = false">
                <div class="col-12 card card-round">
                    <div class="card-body">
                        <form x-data="{ jenisunggahan: '0' }">
                            <div class="row">
                                <div class="mb-2">
                                    <button x-on:click="formperusahaan = false" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                                    <h5>Menu Tambah Perusahaan</h5>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="name">Nama Perusahaan</label>
                                        <input type="text" id="name" class="form-control">
                                        <small class="text-muted">
                                            Menggunakan PT atau CV. Contoh : CV Anugerah Tambang Sentosa
                                        </small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="lokasi">Lokasi Kegiatan</label>
                                        <div class="input-group mb-1 mt-1">
                                            <span class="input-group-text">Kabupaten</span>
                                            <input type="text" class="form-control" placeholder="Nama Kabupaten">
                                        </div>
                                        <div class="input-group mb-1 mt-1">
                                            <span class="input-group-text">Kecamatan</span>
                                            <input type="text" class="form-control" placeholder="Nama Kecamatan">
                                        </div>
                                        <div class="input-group mb-1 mt-1">
                                            <span class="input-group-text">Desa/Kelurahan</span>
                                            <input type="text" class="form-control" placeholder="Nama Desa">
                                        </div>
                                        <small class="text-muted">
                                            Isian Lokasi bisa diisi lebih dari satu, pisahkan dengan tanda koma
                                            (,)
                                        </small>
                                    </div>
                                    <div class="mb-2">
                                        <label for="luas">Luas (HA) - </label>
                                        <small class="text-muted">Contoh : 77,5</small>
                                        <div class="input-group mb-3" style="width: 170px;">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">HA</span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="komoditas">Komoditas</label>
                                        <select name="komoditas" id="komoditas" class="form-select">
                                            <option value="">== Pilih Komoditas ==</option>
                                            <option value="1">Kaolin</option>
                                            <option value="2">Pasir Kuarsa</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="kontak">Kontak Person Perusahaan</label>
                                        <input type="text" id="kontak" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="email">Email Perusahaan</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label for="nosk">Nomor SK</label>
                                        <textarea name="nosk" id="nosk" cols="30" rows="4" class="form-control" placeholder="Contoh : 01082301005150001=08/04/2020=08/04/2023; 01082301005150001=08/04/2020=08/04/2023"></textarea>
                                        <p>
                                            Format Penulisan SK : NOMOR_SK=TGL_SK=TGL_Berakhir <br>
                                            Format TGL : tgl/bln/tahun <br>
                                            Contoh : 01082301005150001=08/04/2020=08/04/2023 <br>
                                            Jika Nomor SK lebih dari satu, pisahkan dengan tanda titik koma (;)
                                            <br>
                                            Harap memperhatikan format penulisan, kesalahan penulisan
                                            menyebabkan tanggal tidak terbaca oleh sistem
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamatsk">Alamat SK</label>
                                        <input type="text" id="alamatsk" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="namadireksi">Nama Direksi</label>
                                        <input type="text" id="namadireksi" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="modal">Modal Kerja</label>
                                        <input type="number" id="modal" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="nosk">Catatan / Keterangan Tambahan</label>
                                    <textarea name="nosk" id="nosk" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Tambah Perusahaan</button>
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
                                    <input type="text" class="form-control" placeholder="Cari Perusahaan...">
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
                                <!-- Projects table -->
                                <table class="table align-items-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td x-data="{ modaldetail: false, edit: false, hapus: false }">
                                                <div class="float-end">
                                                    <span @click="modaldetail = !modaldetail" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-download"> Detail</i>
                                                    </span>
                                                    <span @click="edit = !edit" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"> Edit</i>
                                                    </span>
                                                    <span @click="hapus = !hapus" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"> Hapus</i>
                                                    </span>
                                                </div>
                                                PT Angkasa Mulia Jaya
                                                <div class="mt-2">
                                                    <span class="badge text-bg-warning ps-2">
                                                        Berkas Tersimpan : 78 File
                                                    </span>
                                                </div>
                                                <div>
                                                    <form action="">
                                                        <div x-show="edit" class="overlay"></div>
                                                        <div x-show="edit" x-on:click.outside="edit = false" class="modal-overlay" style="overflow: auto;">
                                                            <div class="row p-4 bg-white">
                                                                <div class="mb-2">
                                                                    <button x-on:click="edit = false" class="float-end btn btn-warning text-white" type="button">Tutup</button>
                                                                    <h5>Edit Data Perusahaan</h5>
                                                                </div>
                                                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                                                    <strong>Berhasil</strong> Data Perusahaan
                                                                    Diperbarui
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="mb-2">
                                                                        <label for="name">Nama
                                                                            Perusahaan</label>
                                                                        <input type="text" id="name" class="form-control">
                                                                        <small class="text-muted">
                                                                            Menggunakan PT atau CV. Contoh : CV
                                                                            Anugerah
                                                                            Tambang Sentosa
                                                                        </small>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="lokasi">Lokasi
                                                                            Kegiatan</label>
                                                                        <div class="input-group mb-1 mt-1">
                                                                            <span class="input-group-text">Kabupaten</span>
                                                                            <input type="text" class="form-control" placeholder="Nama Kabupaten">
                                                                        </div>
                                                                        <div class="input-group mb-1 mt-1">
                                                                            <span class="input-group-text">Kecamatan</span>
                                                                            <input type="text" class="form-control" placeholder="Nama Kecamatan">
                                                                        </div>
                                                                        <div class="input-group mb-1 mt-1">
                                                                            <span class="input-group-text">Desa/Kelurahan</span>
                                                                            <input type="text" class="form-control" placeholder="Nama Desa">
                                                                        </div>
                                                                        <small class="text-muted">
                                                                            Isian Lokasi bisa diisi lebih dari
                                                                            satu,
                                                                            pisahkan dengan tanda koma
                                                                            (,)
                                                                        </small>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="luas">Luas (HA) - </label>
                                                                        <small class="text-muted">Contoh :
                                                                            77,5</small>
                                                                        <div class="input-group mb-3" style="width: 170px;">
                                                                            <input type="text" class="form-control">
                                                                            <span class="input-group-text" id="basic-addon1">HA</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="komoditas">Komoditas</label>
                                                                        <select name="komoditas" id="komoditas" class="form-select">
                                                                            <option value="">== Pilih Komoditas
                                                                                ==
                                                                            </option>
                                                                            <option value="1">Kaolin</option>
                                                                            <option value="2">Pasir Kuarsa
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="kontak">Kontak Person
                                                                            Perusahaan</label>
                                                                        <input type="text" id="kontak" class="form-control">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="email">Email
                                                                            Perusahaan</label>
                                                                        <input type="text" id="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="mb-2">
                                                                        <label for="nosk">Nomor SK</label>
                                                                        <textarea name="nosk" id="nosk" cols="30" rows="4" class="form-control"
                                                                            placeholder="Contoh : 01082301005150001=08/04/2020=08/04/2023; 01082301005150001=08/04/2020=08/04/2023"></textarea>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="alamatsk">Alamat SK</label>
                                                                        <input type="text" id="alamatsk" class="form-control">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="namadireksi">Nama
                                                                            Direksi</label>
                                                                        <input type="text" id="namadireksi" class="form-control">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="modal">Modal Kerja</label>
                                                                        <input type="number" id="modal" class="form-control">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="nosk">Catatan / Keterangan
                                                                            Tambahan</label>
                                                                        <textarea name="nosk" id="nosk" cols="30" rows="8" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="d-grid mt-2 text-center">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Simpan Perubahan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                                                    <label for="name">Nama Perusahaan</label>
                                                                    <input type="text" id="name" class="form-control">
                                                                    <small class="text-muted">
                                                                        Menggunakan PT atau CV. Contoh : CV
                                                                        Anugerah
                                                                        Tambang Sentosa
                                                                    </small>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="lokasi">Lokasi Kegiatan</label>
                                                                    <div class="input-group mb-1 mt-1">
                                                                        <span class="input-group-text">Kabupaten</span>
                                                                        <input type="text" class="form-control" placeholder="Nama Kabupaten">
                                                                    </div>
                                                                    <div class="input-group mb-1 mt-1">
                                                                        <span class="input-group-text">Kecamatan</span>
                                                                        <input type="text" class="form-control" placeholder="Nama Kecamatan">
                                                                    </div>
                                                                    <div class="input-group mb-1 mt-1">
                                                                        <span class="input-group-text">Desa/Kelurahan</span>
                                                                        <input type="text" class="form-control" placeholder="Nama Desa">
                                                                    </div>
                                                                    <small class="text-muted">
                                                                        Isian Lokasi bisa diisi lebih dari satu,
                                                                        pisahkan dengan tanda koma
                                                                        (,)
                                                                    </small>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="luas">Luas (HA) - </label>
                                                                    <small class="text-muted">Contoh :
                                                                        77,5</small>
                                                                    <div class="input-group mb-3" style="width: 170px;">
                                                                        <input type="text" class="form-control">
                                                                        <span class="input-group-text" id="basic-addon1">HA</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="komoditas">Komoditas</label>
                                                                    <select name="komoditas" id="komoditas" class="form-select">
                                                                        <option value="">== Pilih Komoditas ==
                                                                        </option>
                                                                        <option value="1">Kaolin</option>
                                                                        <option value="2">Pasir Kuarsa</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="kontak">Kontak Person
                                                                        Perusahaan</label>
                                                                    <input type="text" id="kontak" class="form-control">
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="email">Email Perusahaan</label>
                                                                    <input type="text" id="email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="mb-2">
                                                                    <label for="nosk">Nomor SK</label>
                                                                    <textarea name="nosk" id="nosk" cols="30" rows="4" class="form-control"
                                                                        placeholder="Contoh : 01082301005150001=08/04/2020=08/04/2023; 01082301005150001=08/04/2020=08/04/2023"></textarea>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="alamatsk">Alamat SK</label>
                                                                    <input type="text" id="alamatsk" class="form-control">
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="namadireksi">Nama
                                                                        Direksi</label>
                                                                    <input type="text" id="namadireksi" class="form-control">
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="modal">Modal Kerja</label>
                                                                    <input type="number" id="modal" class="form-control">
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="nosk">Catatan / Keterangan
                                                                        Tambahan</label>
                                                                    <textarea name="nosk" id="nosk" cols="30" rows="8" class="form-control"></textarea>
                                                                </div>
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
                                                            <button type="button" class="btn btn-sm btn-danger">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
