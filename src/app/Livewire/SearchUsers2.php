<?php

namespace App\Livewire;

use App\Http\Controllers\UserController;
use App\Models\Department;
use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers2 extends Component
{

    use WithPagination;
    public $department = "";
    public $search = '';
    public $userId='';
    public $confirmed = false;
    public $selectedUsers = [];

    public function mount()
    {
        $this->userId = auth()->id();
        $this->departments = Department::all();
    }
    public function render()
    {
        $query = User::query();

        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%');
            });
        }

        if (!empty($this->department)) {
            $query->where('department_id', $this->department);
        }

        $users = $query->paginate(25);

        return view('livewire.search-users2', [
            'users' => $users,
        ]);
    }
    function deleteUser(int $id)
    {
        if ($this->userId == $id) {
            $service = new UserService();
            $service->deleteUser(User::find($id));
            $this->userid = '';

        } else {
            $this->userId = $id;
        }
    }

    public function deleteSelected()
    {
        $uuids = array_keys(collect($this->selectedUsers)
            ->filter(function ($element, $id) {
                return $element == true;
            })
            ->toArray());


        User::whereIn('id', $uuids, )
            ->delete();

    }
}
