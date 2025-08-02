<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            Log::info('Making request to: ' . env('TICKZAP_API_URL'));
            Log::info('Request data: ', [
                'email' => $request->email,
                'password' => '***hidden***'
            ]);

            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->withOptions([
                    'verify' => false, // Only for testing - remove in production
                ])
                ->post(env('TICKZAP_API_URL'), [
                    'email' => $request->email,
                    'password' => $request->password,
                ]);

            Log::info('Response status: ' . $response->status());
            Log::info('Response body: ' . $response->body());

            if ($response->successful() && $response->json()['success'] === true) {
                $apiData = $response->json();
                
                // Extract phone_number_id from nested structure
                $phoneNumberId = null;
                if (isset($apiData['wabas']) && isset($apiData['waba_id'])) {
                    $wabaId = $apiData['waba_id'];
                    if (isset($apiData['wabas'][$wabaId]['phone_numbers'][0]['phone_number_id'])) {
                        $phoneNumberId = $apiData['wabas'][$wabaId]['phone_numbers'][0]['phone_number_id'];
                    }
                }

                // Create or update user in local database
                $user = User::updateOrCreate(
                    ['user_id' => $apiData['user_id']],
                    [
                        'email' => $apiData['email'],
                        'name' => $apiData['user_type'],
                        'user_type' => $apiData['user_type'],
                        'waba_id' => $apiData['waba_id'],
                        'phone_number_id' => $phoneNumberId,
                    ]
                );

                // Log the user in
                Auth::login($user, $request->has('remember'));

                // Store tokens and IDs in session
                session([
                    'tickzap_token' => $apiData['token'],  // This is for Bearer authorization
                    'tickzap_jwt' => $apiData['jwt'],   // This might be used for other purposes
                    'waba_id' => $apiData['waba_id'],
                    'phone_number_id' => $phoneNumberId, // Store phone_number_id in session
                ]);

                Log::info('Login successful. Phone Number ID: ' . $phoneNumberId);

                return redirect('/dashboard');
            } else {
                Log::error('API returned error: ' . $response->body());
                return back()->withErrors([
                    'email' => $response->json()['message'] ?? 'Invalid credentials.',
                ])->withInput();
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Unable to connect to the authentication service. Connection failed.',
            ])->withInput();
        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error('Request error: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Authentication request failed. Please try again.',
            ])->withInput();
        } catch (\Exception $e) {
            Log::error('General error: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Unable to connect to the authentication service. Error: ' . $e->getMessage(),
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
