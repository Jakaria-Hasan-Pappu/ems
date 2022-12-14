<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\project;
use App\Models\Employee;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function projects(){


            $list=project::all();


            return view('backend.pages.projects',compact('list'));

    }

    public function projectscreate(){

        $employees=Employee::all();
        $clients= client::all();


        return view('backend.pages.projectscreate',compact('employees','clients'));

    }

    public function projectsstore(Request  $request)
    {
        //  dd($request->all());


        $fileName=null;
        if($request->hasFile('image'))
        {
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }
       project::create([
            'id'=> $request->id,
            'name'=> $request->name,
            'description'=> $request->description,
            'deadline'=>$request->deadline,
            'image' => $fileName,
            'employee_id'=>$request->employee_id,
            'client_id'=>$request->client_id

        ]);

        return redirect()->back();
    }
    public function deleteprojects( $projects_id)
    {
           $test=project::find($projects_id);
             if($test)
             {
                 $test->delete();
                 return redirect()->back();
             }else{
                 return redirect()->back()->with('error');
             }










}

public function viewprojects($projects_id)
{
  $project=project::find($projects_id);
  return view('backend.pages.projectview',compact('project'));
}

public function edit( $projects_id)
    {

        $project=project::find($projects_id);
        $employees=Employee::all();
        $clients= client::all();
        return view('backend.pages.Projectedit',compact('project','employees','clients'));
    }

  public function update(Request  $request, $projects_id)
    {

//     //    dd($request->all());
      $project=project::find($projects_id);
      $fileName=null;
      if($request->hasFile('image'))
      {
          // generate name
          $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
          $request->file('image')->storeAs('/uploads',$fileName);
      }
      $project->update([

        'name'=> $request->name,
        'description'=> $request->description,
        'deadline'=>$request->deadline,
        'image' =>$fileName,
        'employee_id'=>$request->employee_id,
        'client_id'=>$request->client_id

    ]);






    return redirect()->back();





    }
}
