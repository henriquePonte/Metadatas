<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class SearchDocuments extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = Document::query();

        if (!empty($this->search)) {
            $query->whereHas('documentMdata', function ($query) {
                $query->where('mdata_id', 3)
                    ->where('content', 'like', '%'.$this->search.'%');
            });
        }

        $documents = $query->paginate(25);

        return view('livewire.search-documents', [
            'documents' => $documents,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
