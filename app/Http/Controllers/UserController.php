<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $status = $request->query('status') ?? null;
        $search = $request->query('search') ?? null;
        
        $users = User::when($status !== null, function (Builder $query) use ($status) {
            $query->where('status', $status);
        })->when($search, function (Builder $query, string $search) {
            $query->whereAny([
                'name','email','login',
            ], 'like', "%$search%");
        })->get();

        return response()->view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email', 'max:255'],
            'password' => ['required', 'min:3'],
            'login' => ['required', 'string','unique:users,login', 'max:255'],
        ]);

        User::create($validated);
        return redirect()->route('users');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'min:3'],
            'login' => ['required', 'string', 'max:255'],
        ]);

        if (Auth::attempt([...$validated, 'status' => 1])) {
            $request->session()->regenerate();
 
            return redirect()->route('profile');
        }
        
        return back()->withErrors([
            'login' => 'Не верный Логин или Пароль',
        ])->onlyInput('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function profile()
    {   
        return response()->view('users.profile');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return response()->view('users.edit', [
            'user' => $user
        ]);
    }

    public function editPassword(string $id)
    {
        $user = User::find($id);
        return response()->view('users.edit-password', [
            'id' => $id
        ]);
    }

    public function updatePassword(Request $request, string $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'password' => ['required', 'string', 'max:255', 'min:3'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        DB::table('users')->where('id', $user->id)->update($validated);
        return redirect()->route('users');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users')->ignore($user->id), 'max:255'],
            'login' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'max:255'],
        ]);


        $user->update($validated);
        return redirect()->route('users');
    }

    public function setStatus(string $id)
    {
        $user = User::find($id);
        $user->update(['status' => !$user->status]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
