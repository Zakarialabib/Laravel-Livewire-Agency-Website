<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Livewire\Utils\WithSorting;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use LivewireAlert;

    public $listeners = [
        'refreshIndex' => '$refresh', 'delete',
    ];

    public $showModal = false;

    public $user;

    public $role;

    public $filterRole;

    public int $perPage;

    public array $orderable;

    #[Url(keep: true)]
    public $search = '';

    public array $selected = [];

    public array $paginationOptions;

    public array $rules = [
        'user.name'       => 'required|string|max:255',
        'user.email'      => 'required|email|unique:users,email',
        'user.password'   => 'required|string|min:8',
        'user.phone'      => 'required|numeric',
        'user.city'       => 'nullable',
        'user.country'    => 'nullable',
        'user.address'    => 'nullable',
        'user.tax_number' => 'nullable',
    ];

    protected $queryString = [
        'search',
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    #[Computed]
    public function selectedCount()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function filterRole($role)
    {
        $this->filterRole = $role;
        $this->resetPage(); // Reset pagination to the first page
    }

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = [25, 50, 100];
        $this->orderable = (new User())->orderable;
    }

    public function render()
    {
        abort_if(Gate::denies('user_access'), 403);

        $query = User::with('roles')->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $users = $query->paginate($this->perPage);

        return view('livewire.admin.users.index', compact('users'));
    }

    // getrolesproperty
    public function getRolesProperty()
    {
        return Role::pluck('name', 'id');
    }

    // assign or change user role
    public function assignRole(User $user, $role)
    {
        $user->assignRole($role);
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('user_delete'), 403);

        User::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(User $user)
    {
        abort_if(Gate::denies('user_delete'), 403);

        $user->delete();

        $this->alert('warning', __('User deleted successfully!'));
    }

    public function showModal(User $user)
    {
        $this->user = $user;

        $this->showModal = true;
    }
}