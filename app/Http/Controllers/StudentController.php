<?php

namespace App\Http\Controllers;

use \namespacedModel;
use App\Models\ath;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\ath  $ath
     * @return \Illuminate\Http\Response
     */
    public function index(ath $ath)
    {
       // $students = Student::all();

        // Return the data as a response
       $users=DB::table('users')->get();
       return view('student.index',['users'=>$users]);
      // return view('student.index');
    }
    public function find_student(Request $request){
        $id=$request->id;
        $name=$request->name;
        echo "User :";
        $results = User::findOrFail($id);
        return View('student.searchresult',['data'=>$results,'name']);

    }
    public function search_student(Request $request, ath $ath)
    {
        if($request->all())
        {
            $id = $request->key_term;
            echo "User id is $id";
            #$results = DB::table('users')->where('id', $id); 
            $results = User::findOrFail($id);
            #var_dump($results); die();
            return View('student.searchresult', ['data' => $results]);
        }else{
            return "Error";
        }
       
    }
    public function delete_student(Request $request, Ath $ath)
    {
        $id = $request->key_term;
    
        // Find the student by ID
        $student = User::find($id);
    
        if ($student) {
            // Delete the student
            $student->delete();
    
            // Return the deleteStudent view
            return view('student.deleteStudent', ['data' => $student]);
        } else {
            // Return a user not found message
            return "User not found.";
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\ath  $ath
     * @return \Illuminate\Http\Response
     */
    public function create(ath $ath)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ath  $ath
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ath $ath)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ath  $ath
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show(ath $ath, YourModel $modelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ath  $ath
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function edit(ath $ath, Model $modelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ath  $ath
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, ath $ath,  model  $ modelVariable)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ath  $ath
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy(ath $ath,  model  $modelVariable)
    {
        //
    }
}
