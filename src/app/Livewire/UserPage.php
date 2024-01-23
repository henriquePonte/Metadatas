<?php

namespace App\Livewire;

use App\Models\DocumentPermition;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPage extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        $query = User::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $users = $query->paginate(5);
        $permitions = DocumentPermition::all();

        return view('livewire.user-page', [
            'permitions' => $permitions,
            'users' => $users,
        ]);
    }


}
