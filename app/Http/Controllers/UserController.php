<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFreeCarsRequest;
use App\Models\Car;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getFreeCars(UserFreeCarsRequest $request, User $user)
    {
        $query = $this->getQuery($user);
        $query = $this->applyFilters($request->validated(), $query);
        return response()->json($query->paginate(10));
    }

    public function getQuery(User $user)
    {
        $availableCategory = Role::where('roles.id', $user->role_id)->first()->carCategories()->pluck('id');
        return Car::whereIn('car_category_id', $availableCategory->toArray())
            ->leftJoin('car_reservation', 'cars.id', '=', 'car_reservation.car_id')
            ->whereNull('car_reservation.id')
            ->select('cars.*')
            ->orderBy('id');
    }

    private function applyFilters(array $request, Builder $query): Builder
    {
        if (isset($request['model_name'])) {
            $query->where('model_name', $request['model_name']);
        }
        if (isset($request['category_id'])) {
            $query->where('cars.car_category_id', $request['category_id']);
        }
        return $query;
    }
}
