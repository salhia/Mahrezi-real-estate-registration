<?php

// app/Http/Controllers/Auth/OtpController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function showEmailVerificationForm()
    {
        return view('verify-email');
    }

    public function sendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Email not registered!');
        }
    
        $otp = rand(1000, 9999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP expires after 10 minutes
        $user->save();
    
        // Send OTP via email
        Mail::to($user->email)->send(new OtpMail($otp));
    
        return redirect()->route('verify.otp')->with('email', $user->email);
    }
    public function showOtpVerificationForm()
    {
        return view('verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if (!$user || $user->otp != $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    
        // Clear OTP after successful verification
        $user->otp = null;
        $user->save();
    
        // Log in the user
        Auth::login($user);
    
        return redirect('/')->with('success', 'OTP Verified successfully. Welcome, ' . $user->name);
    }



    // 
    // 
public function showOtpPage()
{
    $otp = $this->generateOtp(); // replace this with your OTP generation logic
    return view('otp', ['otp' => $otp]);
}
}

