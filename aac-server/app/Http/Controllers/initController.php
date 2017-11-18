<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class initController extends Controller
{
    public function init(Request $request){
        // $http_referer = $request->server('HTTP_REFERER');
        $http_referer=$request->articleurl;
        $result=DB::table('articlerecord')->where('articleurl',$http_referer)->first();
        
        
        if($result == null){//沒有紀錄，判定為新加入之文章
            DB::table('articlerecord')->insert(
                ["articleurl" => $http_referer,
                "isuseful" => 0,
                "notuseful" => 0]);

            //返還一個初始資料
            $output = array(
                'sta' => 'ok',
                'isuseful' => 0,
                'notuseful' => 0);
            $output=json_encode($output);
            return $output;
        }
        else{
            $output = array(
                'sta' => 'ok',
                'isuseful' => $result->isuseful,
                'notuseful' => $result->notuseful);
            $output=json_encode($output);
            return $output;
        }
    }
}
