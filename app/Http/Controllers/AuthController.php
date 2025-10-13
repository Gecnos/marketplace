<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        $categories = Category::all();
        return view('auth.register', ['categories' => $categories]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:255',
                'terms' => 'accepted',
                'accountType' => ['required', Rule::in(['client', 'provider'])],
                'company' => 'required_if:accountType,provider|nullable|string|max:255',
                'category_id' => 'required_if:accountType,provider|exists:categories,id',
                'other_category' => 'required_if:category_id,10|nullable|string|max:255|unique:categories,name',
            ],
            [
                'required_if' => 'The :attribute field is required when account type is provider.',
                'category_id.exists' => 'The selected category is invalid.',
                'other_category.required_if' => 'The other category field is required when you select \'Autre\'.',
                'other_category.unique' => 'This category already exists.',
            ]
        );

        $isProvider = $validatedData['accountType'] === 'provider';

        if ($isProvider && $validatedData['category_id'] == 10 && !empty($request->input('other_category'))) {
            $newCategory = Category::create(['name' => $request->input('other_category')]);
            $validatedData['category_id'] = $newCategory->id;
        }

        $user = User::create([
            'name' => $validatedData['prenom'],
            'surname' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'telephone' => $validatedData['phone'],
            'ville' => $validatedData['city'],
            'role' => $validatedData['accountType'],
            'entreprise' => $isProvider ? $validatedData['company'] : null,
            'categorie_id' => $isProvider ? $validatedData['category_id'] : null,
        ]);

        Auth::login($user);

        if ($user->role === 'provider') {
            return redirect()->route('/')->with('success', 'Votre compte Prestataire a été créé!');
        } else {
            return redirect()->route('/')->with('success', 'Votre compte Client a été créé!');
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'provider') {
                return redirect()->intended('/');
            }
            return redirect()->intended(route('/'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    }
}
