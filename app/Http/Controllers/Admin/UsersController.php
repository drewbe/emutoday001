<?php
namespace emutoday\Http\Controllers\Admin;
use emutoday\User;
use Illuminate\Http\Request;
use emutoday\Http\Requests;

class UsersController extends Controller
{
    protected $users;
    public function __construct(User $users)
    {
        $this->users = $users;
        parent::__construct();
    }

    public function index()
    {
        $users = $this->users->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function store(Requests\StoreUserRequest $request)
    {
        $this->users->create($request->only('name', 'email', 'password'));
        flash()->success('User has been created.');
        return redirect(route('admin.users.index'));//->with('status', 'User has been created.');
    }


    public function edit($id)
    {
        $user = $this->users->findOrFail($id);
        return view('admin.users.form', compact('user'));
    }

    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->fill($request->only('name', 'email', 'password'))->save();
        flash()->success('User has been updated.');
        return redirect(route('admin.users.edit', $user->id));//->with('status', 'User has been updated.');
    }
    public function confirm(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return view('admin.users.confirm', compact('user'));
    }

    public function destroy(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->delete();
        flash()->warning('User has been deleted.');
        return redirect(route('admin.users.index'));//->with('status', 'User has been deleted.');
    }
}
