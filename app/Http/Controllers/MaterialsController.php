<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class MaterialsController extends Controller
{
    public function index(): Response
    {
        /** @var User $user */
        $user = auth()->user();

        return response()->view("materials", [
            "user" => $user,
        ]);
    }
}
