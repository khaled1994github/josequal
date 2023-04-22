<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeData;
use App\Models\Employee;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {

        $employees = Employee::where('company_id', $company_id)->paginate(5);
        return view('employees', ['employee'=>'employee','company_id' => $company_id,'employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeData $request)
    {

      $request->validated();
      Employee::create([
            "first_name" => $request->fname,
            "last_name" => $request->lname,
            "company_id" => $request->company,
            "email" => $request->email,
            "phone" => $request->phone,
      ]);


        $request->session()->flash("success", "Employee added successfully");
        return redirect("employees/{$request->company}");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::find($id);
      return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employee = Employee::find($id);
      $employee->first_name = $request->fname;
      $employee->last_name = $request->lname;
      $employee->email = $request->email;
      $employee->phone = $request->phone;
      $employee->save();
      $request->session()->flash("success", "Employee updated successfully");
      return redirect("employees/{$request->company}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employee = Employee::find($id);
      $employee->delete();
      return;
    }
}
