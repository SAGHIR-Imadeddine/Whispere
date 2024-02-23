<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = null;
        $commonFriends=null;
        $totalFriends=null;
        if ($request->has('profile_user')) {
            $userId = $request->input('profile_user');
            $user = User::find($userId);
            if ($user) {
                $existingRequest = FriendRequest::where('user_id', auth()->id())
                    ->where('friend_id', $userId)
                    ->first();

                if (!$existingRequest) {
                    $friendRequest = new FriendRequest();
                    $friendRequest->user_id = auth()->id();
                    $friendRequest->friend_id = $userId;
                    $friendRequest->request_status = 'accepted';
                    $friendRequest->save();
                }

                $totalFriends = DB::table('friend_requests')
                    ->where(function ($query) use ($userId) {
                        $query->where('user_id', auth()->id())
                            ->where('request_status', 'accepted')
                            ->orWhere('friend_id', auth()->id());
                    })
                    ->count();

                $commonFriends = DB::table('friend_requests')
                    ->where('user_id', auth()->id())
                    ->where('request_status', 'accepted')
                    ->whereIn('friend_id', function ($query) use ($userId) {
                        $query->select('friend_id')
                            ->from('friend_requests')
                            ->where('user_id', $userId)
                            ->where('request_status', 'accepted');
                    })
                    ->count();

                    
            }
        }

        $cachedUrl = Cache::get('profile_link_' . auth()->id());

        if (!$cachedUrl) {
            $url = URL::temporarySignedRoute(
                'profile.edit',
                now()->addHour(),
                ['profile_user' => auth()->id()]
            );

            Cache::put('profile_link_' . auth()->id(), $url, now()->addHour());
        } else {
            $url = $cachedUrl;
        }

        $qrCode = QrCode::size(100)->generate($url);

        return view('profile.edit', [
            'user' => $user ?: $request->user(),
            'url' => $url,
            'qrCode' => $qrCode,
            'commonFriends' => $commonFriends ?: 0,
            'totalFriends' => $totalFriends ?: 0,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
