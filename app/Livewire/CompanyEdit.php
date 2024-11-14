<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Nomorsk;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompanyEdit extends Component
{
    public $id;
    #[Validate('required|string')]
    public $name_company;
    #[Validate('required|string')]
    public $name_kontak;
    #[Validate('required|numeric|min:10')]
    public $kontak;
    public $email;
    public $catatan;
    public $company_code;
    public $limit_share;
    public $password_active;
    public $password;
    public $is_active;

    // public $nomorsks; // untuk list nomor
    #[Validate('required', message: 'Nomor SK harus diisi..')]
    #[Validate('unique:nomorsks,nomor', message: 'Nomor SK Telah Terdaftar')]
    public $nomor; // untuk tambah nomor sk

    public function updatedEmail()
    {
        $this->validate(
            [
                'email' => 'required|email|unique:companies,email,' . $this->id
            ],
            [
                'email.unique' => 'Email sudah terdaftar, gunakan email lainnya.',
            ]
        );
    }

    public function addnomorsk()
    {
        $this->validate([
            'nomor' => 'required|unique:nomorsks,nomor',
        ]);

        Nomorsk::create([
            'nomor' => $this->nomor,
            'company_id' => $this->id,
            'tahapan_id' => 1,
            'region_id' => "62",
            'provinsi' => "KALIMANTAN TENGAH",
        ]);

        session()->flash('success', 'Nomor SK Berhasil Ditambahkan');
        $this->nomor = '';
    }

    public function hapusnomorsk($id)
    {
        Nomorsk::find($id)->delete();
        session()->flash('success', 'Nomor SK Berhasil Dihapus');
    }

    public function mount($id)
    {
        $this->id = $id;
        $company = Company::with('nomorsks')->whereId($id)->first();
        $this->name_company = $company->name_company;
        $this->name_kontak = $company->name_kontak;
        $this->kontak = $company->kontak;
        $this->email = $company->email;
        $this->catatan = $company->catatan;
        $this->company_code = $company->company_code;
        $this->limit_share = $company->limit_share;
        $this->password_active = $company->password_active;
        $this->password = $company->password;
        $this->is_active = $company->is_active;
    }

    public function refresh()
    {
        return redirect('perusahaan/' . $this->id)->with('success', 'Halaman Diperbaharui');
    }

    public function update()
    {
        $this->validate();
        $company = Company::find($this->id);
        $data = [
            'name_company' => $this->name_company,
            'name_kontak' => $this->name_kontak,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'catatan' => $this->catatan,
        ];
        try {
            $company->update($data);
            session()->flash('success', 'Perubahan data perusahaan telah disimpan');
        } catch (\Exception $e) {
            session()->flash('success', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.company-edit', [
            'nomorsks' => Nomorsk::where('company_id', $this->id)->get()
        ]);
    }
}
