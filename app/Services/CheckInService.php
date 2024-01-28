<?php

namespace App\Services;

use App\Models\CheckIn;
use App\Models\User;

/**
 * Сервис дневного Check-in опросника
 */
class CheckInService
{
    /**
     * Сохранить/обновить дневной отчет
     */
    public function store(array $data, User $currentUser, ?CheckIn $item = null): CheckIn
    {
        $item = $item ?? new CheckIn();
        $item->user_id = $currentUser->id;
        $item->stream_id = $currentUser->stream_id;
        $item->week = $data["week"];
        $item->day = $data["day"];
        $item->training = $data["training"];
        $item->water = $data["water"];
        $item->sleep = $data["sleep"];
        $item->nutrition = $data["nutrition"];
        $item->alcohol = $data["alcohol"];

        $item->save();

        return $item;
    }
}
