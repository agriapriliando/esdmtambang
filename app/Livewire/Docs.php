<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Doc;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;


class Docs extends Component
{
    use WithFileUploads, WithPagination;

    #[Validate('required', message: 'Perusahaan tidak boleh kosong')]
    public $company_id;
    public $jenisunggahan;
    public $type;
    public $size;
    public $file = [];
    public $upload_by;
    public $title_link;
    #[Validate('required', message: 'File tidak boleh kosong')]
    #[Validate('url', message: 'Isian harus berbentuk URL atau Link Google Drive, atau sejenisnya')]
    public $file_link;
    public $visibilitas;

    public $search = '';
    public $pilih_company_id;
    public $page = 6;

    public $company_search;

    public function uploadfile()
    {
        try {
            if ($this->jenisunggahan == 0) {
                foreach ($this->file as $file) {
                    $title = $file->getClientOriginalName();
                    $type = $file->getClientOriginalExtension();
                    $size = $file->getSize();
                    $file_link = $file->store('berkas/' . $this->company_id); // upload file
                    $data = [
                        'id' => Carbon::now()->timestamp . rand(11111, 99999),
                        'company_id' => $this->company_id,
                        'title' => $title,
                        'type' => $type,
                        'size' => $size,
                        'file_link' => $file_link,
                        'upload_by' => 'Adi Nagroho',
                    ];
                    Doc::create($data);
                }
                $this->reset();
                session()->flash('success', 'Berhasil Upload Dokumen');
            } else {
                $title = $this->title_link;
                $type = 'link';
                $file_link = $this->file_link;
                $data = [
                    'id' => Carbon::now()->timestamp . rand(11111, 99999),
                    'company_id' => $this->company_id,
                    'title' => $title,
                    'type' => $type,
                    'file_link' => $file_link,
                    'upload_by' => 'Adi Nagroho',
                ];
                Doc::create($data);
                $this->reset();
                session()->flash('success', 'Berhasil Upload Dokumen');
            }
        } catch (\Exception $e) {
            $this->reset();
            session()->flash('success', $e->getMessage());
        }
    }

    public function download($id)
    {
        $doc = Doc::findOrFail($id);
        if ($doc->type == 'link') {
            return redirect($doc->file_link);
        }
        // return Storage::download($doc->file_link);
        return Response::download(storage_path('app/' . $doc->file_link), $doc->title);
    }

    public function delete($id)
    {
        $doc = Doc::findOrFail($id);
        Storage::delete($doc->file_link);
        $doc->delete();
        session()->flash('success', 'Berhasil Hapus Dokumen');
    }

    public function getPilihCompanyId($id = null)
    {
        // $this->resetPage();
        $this->pilih_company_id = $id;
    }

    public function render()
    {
        return view('livewire.docs', [
            'docs' => Doc::with('company')
                ->search($this->search)
                ->when($this->pilih_company_id, function ($query) {
                    $query->where('company_id', $this->pilih_company_id);
                })
                ->paginate($this->page),
            'docs_count' => Doc::count(),
            'companies' => Company::where('name_company', 'like', '%' . $this->company_search . '%')->get(),
        ]);
    }
}
