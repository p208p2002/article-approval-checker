<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class voteController extends Controller
{
    //
    public function useful(Request $request){
        $data= DB::table('articlerecord')
            ->where('articleurl',$request->articleurl)->first();
        if($data != null){
            $vote = $data->isuseful;
            $vote++;
            //update
            $data= DB::table('articlerecord')
                ->where('articleurl',$request->articleurl)
                ->update(['isuseful' => $vote]);
            return 0;
        }
        return -1;
    }

    public function notuseful(Request $request){
        $data= DB::table('articlerecord')
            ->where('articleurl',$request->articleurl)->first();
        if($data != null){
            $vote = $data->notuseful;
            $vote++;
            //update
            $data= DB::table('articlerecord')
                ->where('articleurl',$request->articleurl)
                ->update(['notuseful' => $vote]);
            return 0;
        }
        return -1;
    }
}
