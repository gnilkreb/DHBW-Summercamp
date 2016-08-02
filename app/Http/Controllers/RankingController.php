<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    public function index() {
        $activeUserId = Auth::user()->id;
        $users = User::where('role', 'user')->get();
        foreach($users as $user) {
            $user->stars = $user->getStars();
            $user->rndm = rand(10, 30);
        }

        $ranking = $users->sortByDesc('stars');


        return view('ranking', ['activeUserId' => $activeUserId, 'users' => $ranking]);
    }
}
