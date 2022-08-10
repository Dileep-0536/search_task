<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{

    public function index(Request $request)
    {
        $user_info_data = UserInfo::paginate(10);
        if($request->ajax())
        {
            $query = $request->get('query');
            $where_in=[];
            $query = str_replace(" ", "%", $query);
            if($request->get('column_name') == 'status') {
                if($query=="All"){
                    $where_in = ['Active','In-Active'];
                } else {
                    $where_in = [$query];
                }
            }
            $user_info_data = UserInfo::where('name', 'like', '%'.$query.'%')
            ->orWhere('email', 'like', '%'.$query.'%')
            ->orWhere('city', 'like', '%'.$query.'%')
            ->orWhere('date_of_birth', 'like', '%'.$query.'%')
            ->orWhereIn('status', $where_in)
            ->paginate(10);
            return view('user_info.pagination_data', compact('user_info_data'))->render();
        }
        return view("user_info.index", compact('user_info_data'));
    }
}
