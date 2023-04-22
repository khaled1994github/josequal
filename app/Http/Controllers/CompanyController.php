<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyData;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);
        //print_r($companies);die;
        return view('companies',['company'=>'company', 'companies' => $companies ]);
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
    public function store(CompanyData $request)
    {

        //echo $request->file('logo')->getClientOriginalName();die;
        $request->validated();
        $logo =  pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME).'_'.$request->name.'.'.$request->file('logo')->getClientOriginalExtension();
        Company::create([
              "name" => $request->name,
              "email" => $request->email,
              "logo" => $logo,
              "website" => $request->website,
        ]);

        $upload = Storage::putFileAs(
              'public', $request->file('logo'), $logo
          );

          $request->session()->flash("success", "Company added successfully");
    			return redirect("companies");
        //public_path('storage')
        //$request->session()->flash("success", "data submitted successfully");
  			//return redirect("add-student-req");*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return response()->json($company);
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

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();
        $request->session()->flash("success", "Company updated successfully");
        return redirect("companies");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $company = Company::find($id);
      $company->delete();
      Employee::where('company_id',$id)->delete();
      //$request->session()->flash("success", "Company updated successfully");
      //return redirect("companies");
      return;

    }
}
