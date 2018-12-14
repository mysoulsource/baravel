<?php

namespace App\Http\Controllers\API;

use App\Demand;
use App\events;
use App\Requeststatus;
use App\User;
use App\Blood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(){
        $users = User::count();
        $data = [
            'users'=> User::count(),
            'successRequest' => Requeststatus::where('status','=',1)->count(),
            'events'=>events::count(),
            'demands'=>Demand::count()
        ];
        return $data;
    }
    public function getBloodgroup(){
          $bloodGroups = Blood::withCount('users')->get();
          $bloodGroupName = array();
          $userCount = array();
          foreach ($bloodGroups as $bloodGroup){
              array_push($bloodGroupName,$bloodGroup->name);
             array_push($userCount, $bloodGroup->users_count);
          }
            $data = [
            'bloodGroupName' => $bloodGroupName,
            'usercount'=>$userCount
              ];
            return response()->json($data);

    }
}
