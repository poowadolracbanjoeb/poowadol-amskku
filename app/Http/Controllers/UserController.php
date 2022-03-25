<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\users_has_activities;
use App\Models\dormitories;
use App\Models\dormitory_user_history;
use App\Models\user_score;
use App\Exports\ExportUserHasActivity;
use App\Models\Activity;
use App\Imports\UsersHistoryImport;
use App\Imports\UsersScoreImport;



class UserController extends Controller
{
    public function changePasswordStudent()
    {
        return view('auth.ManagerUser.changePasswordStudent'); 
    }
    public function changePasswordDormitory_Director()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Director'); 
    }
    public function changePasswordDormitory_Chairman()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Chairman'); 
    }
    public function changePasswordDormitory_Counselor()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Counselor'); 
    }
    public function changePasswordHead_Dormitory_Service()
    {
        return view('auth.ManagerUser.changePasswordHead_Dormitory_Service'); 
    }
    public function changePasswordDirector_Dormitory_Service_Division()
    {
        return view('auth.ManagerUser.changePasswordDirector_Dormitory_Service_Division'); 
    }
    public function changePasswordHead_Information_Unit()
    {
        return view('auth.ManagerUser.changePasswordHead_Information_Unit'); 
    }
    
    
    
    
    
    

    public function showDataUserStudent()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserStudent')->with('data',$data);
    }
    public function showDataUserDormitory_Director()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserDormitory_Director')->with('data',$data);
    }
    public function showDataUserDormitory_Chairman()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserDormitory_Chairman')->with('data',$data);
    }
    public function showDataUserDormitory_Counselor()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserDormitory_Counselor')->with('data',$data);
    }
    public function showDataUserHead_Dormitory_Service()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserHead_Dormitory_Service')->with('data',$data);
    }
    public function showDataUserDirector_Dormitory_Service_Division()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserDirector_Dormitory_Service_Division')->with('data',$data);
    }
    public function showDataUserHead_Information_Unit()
    {
        $data = dormitory_user_history::all();
        return view('auth.ManagerUser.showDataUserHead_Information_Unit')->with('data',$data);
    }
    
    
    
    
    
    
    

 





    public function showDataActivityJoinStudent($id_users)
    {
        $Activity = Activity::all();
        $joinActivity = users_has_activities::all();
        $user_score = DB::table('user_score')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.showDataActivityJoinStudent',compact('user_score'))->with('data', $joinActivity);

    }
    public function showDataActivityJoinDormitory_Director($id_users)
    {
        $joinActivity = users_has_activities::all();
        $user_score = DB::table('user_score')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.showDataActivityJoinDormitory_Director',compact('user_score'))->with('data', $joinActivity);

    }

    public function showDataActivityJoinDormitory_Chairman($id_users)
    {
        $joinActivity = users_has_activities::all();
        $user_score = DB::table('user_score')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.showDataActivityJoinDormitory_Chairman',compact('user_score'))->with('data', $joinActivity);

    }





    public function showDataActivityAllStudent()
    {
        $Activity = Activity::all();
        return view('auth.ManagerUser.showDataActivityAllStudent')->with('data',$Activity);
    }
    public function showDataActivityAllDormitory_Counselor()
    {
        $Activity = Activity::all();
        return view('auth.ManagerUser.showDataActivityAllDormitory_Counselor')->with('data',$Activity);
    }
    public function showDataActivityAllHead_Dormitory_Service()
    {
        $Activity = Activity::all();
        return view('auth.ManagerUser.showDataActivityAllHead_Dormitory_Service')->with('data',$Activity);
    }
    public function showDataActivityAllDirector_Dormitory_Service_Division()
    {
        $Activity = Activity::all();
        return view('auth.ManagerUser.showDataActivityAllDirector_Dormitory_Service_Division')->with('data',$Activity);
    }
    
    
    

    

    


    public function showDataStudentAllDormitory_Director(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        // $usersDorm = DB::table('dormitory_user_history')->where('dormName','หอพักชายที่8');
        $usersDorm = dormitory_user_history::where('');

        // $userHistory = dormitory_user_history::where('semester', $request->semester);
        
        $semester = $request->input('semester');
        $search =  $request->input('search');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['search' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.showDataStudentAllDormitory_Director',compact('myDorm'))->with('data',$Members)->with('data2',$usersDorm);
    }

    public function showDataStudentAllDormitory_Chairman(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        // $usersDorm = DB::table('dormitory_user_history')->where('dormName','หอพักชายที่8');
        $usersDorm = dormitory_user_history::where('');

        // $userHistory = dormitory_user_history::where('semester', $request->semester);
        
        $semester = $request->input('semester');
        $search =  $request->input('search');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['search' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.showDataStudentAllDormitory_Chairman',compact('myDorm'))->with('data',$Members)->with('data2',$usersDorm);
    }

    public function showDataStudentAllDormitory_Counselor(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        // $usersDorm = DB::table('dormitory_user_history')->where('dormName','หอพักชายที่8');
        $usersDorm = dormitory_user_history::where('');

        // $userHistory = dormitory_user_history::where('semester', $request->semester);
        
        $semester = $request->input('semester');
        $search =  $request->input('search');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['search' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.showDataStudentAllDormitory_Counselor',compact('myDorm'))->with('data',$Members)->with('data2',$usersDorm);
    }
    



    public function showDataStudentAllHead_Dormitory_Service(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.showDataStudentAllHead_Dormitory_Service',compact('myDorm'))->with('data',$Members);
    }


    public function showDataStudentAllDirector_Dormitory_Service_Division(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.showDataStudentAllDirector_Dormitory_Service_Division',compact('myDorm'))->with('data',$Members);
    }

    public function manageUserAllHead_Information_Unit(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users',auth()->user()->id_users)->first();
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('id_users', 'like', '%'.$search.'%');
            })
            ->paginate(7);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(7);
        }
        return view('auth.ManagerUser.manageUserAllHead_Information_Unit',compact('myDorm'))->with('data',$Members);
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportUserHasActivity()
    {
        return Excel::download(new ExportUserHasActivity, 'ExportUserHasActivity.xlsx');
    }
    

    /**
     * @return \Illuminate\Support\Collection
     */

    public function importUsers()
    {
        Excel::import(new UsersImport, request()->file('file'));
        return back();
    }

    public function importUsersHistory()
    {
        Excel::import(new UsersHistoryImport, request()->file('file'));

        return back();
    }
    public function importUsersScore()
    {
        Excel::import(new UsersScoreImport, request()->file('file'));

        return back();
    }
    


    public function changePassword(Request $request)
    {
        $id_users =$request->id_users;
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        DB::table('users')->where('id_users', $id_users)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('post_update', 'เปลี่ยนรหัสผ่านสำเร็จ');
    }
    
    
    



    


    public function  userDetailDormitory_Director($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailDormitory_Director', compact('user'));
    }
    public function  userDetailDormitory_Chairman($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailDormitory_Chairman', compact('user'));
    }

    public function  userDetailDormitory_Counselor($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailDormitory_Counselor', compact('user'));
    }
    public function  userDetailHead_Dormitory_Service($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailHead_Dormitory_Service', compact('user'));
    }
    public function  userDetailDirector_Dormitory_Service_Division($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailDirector_Dormitory_Service_Division', compact('user'));
    }
    public function  userDetailHead_Information_Unit($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.userDetailHead_Information_Unit', compact('user'));
    }



    public function  editUserDetailHead_Information_Unit($id_users)
    {
        $user = DB::table('users')->where('id_users', $id_users)->first();
        return view('auth.ManagerUser.editUserDetailHead_Information_Unit', compact('user'));
    }

    public function  submitEditUserDetailHead_Information_Unit(Request $request)
    {
        DB::table('users')->where('id_users', $request->id_users)->update([
            'name' => $request->name,
            'id_users' =>  $request->id_users,
            'student_faculty' => $request->student_faculty,
            'student_degree' =>  $request->student_degree,
            'tel' => $request->tel,
            'email' => $request->email
        ]);
        return back()->with('post_update', 'บันทึกเค้าโครงร่างกิจกรรมสำเร็จ');
        
    }

    public function deleteUserHead_Information_Unit($id_user)
    {
        DB::table('users')->where('id_users', $id_user)->delete();
        return back()->with('post_delete', 'ลบสำเร็จแล้ว');
    }

    public function  importUserHead_Information_Unit()
    {
        return view('auth.ManagerUser.importUserHead_Information_Unit');
    }

     
    
    

    
    
}
