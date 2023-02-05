<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use Illuminate\Http\Request;
use App\Models\CompletedTask as CompletedTaskModel;
use Illuminate\Support\Facades\DB;

class CompletedTaskController extends Controller
{
    /**
     * タスク一覧ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        /*
        // 1Page辺りの表示アイテム数を設定
        $per_page = 20;
        
        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);
        */

//$sql = $this->getListBuilder()
  //          ->toSql();
//echo "<pre>\n"; var_dump($sql, $list); exit;
//var_dump($sql);

        //
        //return view('task.completed_list', ['completed_list' => $list]);
        // return view('task.completed_list');
         
                 // 一覧の取得
       $list = CompletedTaskModel::get();
  $list = $this->getListBuilder()
                     ->paginate(2);
  
//$sql = TaskModel::toSql();
//echo "<pre>\n"; var_dump($sql, $list); exit;
     //   return view('task.completed_list');
           return view('task.completed_list', ['completed_list' => $list]);
    }
    
    protected function getListBuilder()
    {
        return CompletedTaskModel::where('user_id', Auth::id())
                     ->orderBy('priority', 'DESC')
                     ->orderBy('period')
                     ->orderBy('created_at');
           
    }
    

}