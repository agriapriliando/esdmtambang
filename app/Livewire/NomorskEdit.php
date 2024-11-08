<?php

namespace App\Livewire;

use App\Models\Nomorsk;
use App\Models\Region;
use Livewire\Component;

class NomorskEdit extends Component
{
    public $id;
    public $company_id;
    public $tahapan_id;
    public $region_id;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $kelurahan;
    public $nomor;
    public $tgl_mulai;
    public $tgl_selesai;
    public $luasha;
    public $alamat_sk;

    public $name_company;

    public $kecamatans = [];
    public $kelurahans = [];

    public function updatedKabupaten()
    {
        $this->kecamatan = [];
        if ($this->kabupaten == null) {
            $this->kecamatan = [];
        }
        $id_region = Region::where('name_region', $this->kabupaten)->first();
        if ($id_region) {
            $this->region_id = $id_region->id;
            $this->kecamatans = Region::where('parent_region', $id_region->id)->get();
        } else {
            $this->kecamatans = [];
            $this->kecamatan = [];
        }
    }

    public function updateSk()
    {
        $nomorsk = Nomorsk::find($this->id);
        $nomorsk->nomor = $this->nomor;
        $nomorsk->region_id = $this->region_id;
        $nomorsk->kabupaten = $this->kabupaten;
        $nomorsk->kecamatan = $this->kecamatan;
        $nomorsk->kelurahan = $this->kelurahan;
        $nomorsk->tgl_mulai = $this->tgl_mulai;
        $nomorsk->tgl_selesai = $this->tgl_selesai;
        $nomorsk->luasha = $this->luasha;
        $nomorsk->alamat_sk = $this->alamat_sk;
        $nomorsk->save();

        session()->flash('success', 'Data SK Berhasil Diperbarui');
    }
    public function mount($id)
    {
        $this->id = $id;
        $nomorsk = Nomorsk::with('company')->whereId($id)->first();
        $this->company_id = $nomorsk->company_id;
        $this->name_company = $nomorsk->company->name_company;
        $this->tahapan_id = $nomorsk->tahapan_id;
        $this->region_id = $nomorsk->region_id;
        $this->provinsi = $nomorsk->provinsi;
        $this->kabupaten = $nomorsk->kabupaten;
        $this->kecamatan = $nomorsk->kecamatan;
        $this->kelurahan = $nomorsk->kelurahan;
        $this->nomor = $nomorsk->nomor;
        $this->tgl_mulai = $nomorsk->tgl_mulai;
        $this->tgl_selesai = $nomorsk->tgl_selesai;
        $this->luasha = $nomorsk->luasha;
        $this->alamat_sk = $nomorsk->alamat_sk;
    }

    public function render()
    {
        $id_region = Region::where('name_region', $this->kabupaten)->first();
        if ($id_region) {
            $this->kecamatans = Region::where('parent_region', $id_region->id)->get();
        }
        return view(
            'livewire.nomorsk-edit',
            [
                'kabupatens' => Region::whereParentRegion("62")->get(),
            ]
        );
    }
}
