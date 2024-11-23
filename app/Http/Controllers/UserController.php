<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUser;

use App\Http\Resources\UserResource;


class UserController extends Controller
{


    public function dashboard()
    {
        // Contar usuarios activos
        $activeUsers = User::count();

        return inertia('Dashboard.vue', [
            'activeUsers' => $activeUsers,
        ]);
    }

    public function index(Request $request)
    {
        $usersQuery = User::query();
        $this->applySearch($usersQuery, $request->search);

        $users = UserResource::collection($usersQuery->paginate(5));

        return inertia('Users/Index', [
            'users' => $users,
            'search' => $request->search ?? ''
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function($query, $search) {
            $query->where('name','like','%'.$search.'%');
        });
    }

    public function create()
    {
        $users = UserResource::collection(User::all());

        return inertia('Users/Create', [
            'users' => $users,

        ]);
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        // $Faqs = FaqResource::collection(Faq::all());

        return inertia('Users/Edit', [
            'user' => UserResource::make($user),
        ]);
    }

    public function update(UpdateUser $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}


