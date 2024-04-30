<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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
        return view('voter.dashboard.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url ='';
        if ($request->user()->role === 'admin'){
            $url = '/admin/dashboard';
        }elseif($request->user()->role === 'JPMPP'){
            $url = '/jpmpp/dashboard';
        }elseif ($request->user()->role === 'candidate'){
            $url = '/candidate/dashboard';
        }elseif ($request->user()->role === 'voter'){
            $url = '/dashboard';
        }



        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginWithOtp(Request $request)
    {
    // Validation
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
        'otpnumber' => ['required', 'numeric', 'digits:6'],
    ]);

    // Validation Logic
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    if ($user->otp !== $request->otpnumber) {
        return redirect()->back()->with('error', 'Your OTP is not correct');
    }

    $now = Carbon::now();
    if ($now->isAfter($user->expire_at)) {
        return redirect()->route('admin.login')->with('error', 'Your OTP has expired');
    }

    // Expire The OTP
    $user->update([
        'otp' => null,
        'expire_at' => null,
    ]);

    // Log in the user
    Auth::login($user);

    return redirect('/admin/dashboard');
}

public function OTPRequest(Request $request){
    $request->validate([
        'email' => 'required|email', 
    ]);

    $otp = rand(123456, 999999);

    User::where('email',$request->email)->update([
        'otp' => $otp,
        'expire_at' => Carbon::now()->addMinutes(10)
    ]);

    return response()->json(['message' => 'OTP generated successfully'], 200);
}
}
