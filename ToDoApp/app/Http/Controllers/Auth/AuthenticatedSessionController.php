<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate login inputs
        $this->validateLogin($request);

        // Retrieve sanitized credentials
        $credentials = $this->credentials($request);

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->user()->usertype === 'admin') {
                return redirect('adminpage');
            }

            return redirect()->intended(route('dashboard', [], false));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Retrieve sanitized login credentials from the request.
     */
    protected function credentials(Request $request): array
    {
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);

        return [
            'email' => $email,
            'password' => $request->password,
        ];
    }

    /**
     * Validate the login request.
     */
    protected function validateLogin(Request $request): void
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    }
}
