<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\ChangeLangRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreCredentialsRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(): Response
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->hasRole(RoleEnum::ADMIN)) {
            return response()->view("profile.admin", [
                "user" => $user,
            ]);
        }

        return response()->view("profile.user", [
            "user" => $user,
        ]);
    }

    public function storeCredentials(StoreCredentialsRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->update([
            "name"  => $request->input("name"),
            "phone" => $request->input("phone"),
        ]);

        return redirect()->to('/profile?modal=thanksModal');
    }

    public function changePassword(ChangePasswordRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->update([
            "password" => Hash::make($request->input("password")),
        ]);

        return redirect()->to('/profile?modal=thanksModal');
    }

    public function changeLang(ChangeLangRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->update([
            "language" => $request->input("language"),
        ]);


        return redirect()->to('/profile?modal=thanksModal');
    }
}
