<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Doc;
use App\Models\Nomorsk;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Companies extends Component
{
    #[Validate('required|unique:companies,name_company|regex:/^[\pL\s]+$/u')]
    public $name_company;
    #[Validate('required')]
    public $name_kontak;
    #[Validate('required|numeric')]
    public $kontak;
    #[Validate('required|email|unique:companies,email')]
    public $email;
    public $catatan;
    public $company_code;
    public $limit_share;
    public $password_active;
    public $password;
    public $is_active;

    public $search;

    public $page = 10;

    public function addCompany()
    {
        $dataCompany = $this->validate();
        // dd($dataCompany);
        try {
            Company::create($dataCompany);
            session()->flash('success', 'Data Perusahaan Berhasil Ditambahkan');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('success', $e->getMessage());
        }
    }

    public function deleteCompany($id)
    {
        try {
            $doc_id = Doc::where('company_id', $id)->pluck('id');
            Doc::destroy($doc_id);
            $nomorsk_id = Nomorsk::where('company_id', $id)->pluck('id');
            Nomorsk::destroy($nomorsk_id);
            Company::destroy($id);
            session()->flash('success', 'Data Perusahaan Berhasil Dihapus');
        } catch (\Exception $e) {
            session()->flash('success', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.companies', [
            'companies' => Company::with('nomorsks', 'docs')
                ->search($this->search)
                ->paginate($this->page),
        ]);
    }
}
