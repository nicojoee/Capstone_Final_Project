<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;
    
    public function __construct()
    {
        $this->clientId = env('GOOGLE_CLIENT_ID');
        $this->clientSecret = env('GOOGLE_CLIENT_SECRET');
        $this->redirectUri = env('GOOGLE_REDIRECT_URI');
    }

    public function redirectToGoogle()
    {
        $params = [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => 'email profile',
            'access_type' => 'offline',
            'prompt' => 'consent'
        ];
        
        $authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
        
        return redirect($authUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('login')->with('error', 'Authentication failed. No authorization code received.');
        }

        try {
            // Exchange code for access token
            $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
                'code' => $request->get('code'),
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'grant_type' => 'authorization_code'
            ]);

            if (!$response->successful()) {
                return redirect()->route('login')->with('error', 'Failed to get access token from Google.');
            }

            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'];

            // Get user information
            $userResponse = Http::withToken($accessToken)
                ->get('https://www.googleapis.com/oauth2/v2/userinfo');

            if (!$userResponse->successful()) {
                return redirect()->route('login')->with('error', 'Failed to get user information from Google.');
            }

            $googleUser = $userResponse->json();

            // Create or update user
            $user = User::updateOrCreate(
                ['google_id' => $googleUser['id']],
                [
                    'name' => $googleUser['name'],
                    'email' => $googleUser['email'],
                    'avatar' => $googleUser['picture'] ?? null,
                ]
            );

            Auth::login($user);

            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication error: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}