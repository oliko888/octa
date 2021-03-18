<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('employee.index', ['employees' => $employees]);
    }


    public function create()
    {
        $companies = Company::all();

        return view('employee.create', ['companies' => $companies]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'unique:employees,email',
        ]);

        $employee = new Employee;
        $employee->first_name = $request->firstName;
        $employee->last_name = $request->lastName;
        $employee->email = $request->email;
        $employee->company_id = $request->companyId;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employee.index')->with(['success' => 'Record has been stored!']);
    }


    public function show($id)
    {
        $employee = Employee::find($id);

        $company = null;
        if (!empty($employee->company_id)) {
            $company = Company::where('id', $employee->company_id)->get('name');
        }

        return view('employee.show', ['employee' => $employee, 'company' => $company]);
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('employee.edit', ['employee' => $employee, 'companies' => $companies]);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => ['max:255', 'email', Rule::unique('users')->ignore($id)],
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $request->firstName;
        $employee->last_name = $request->lastName;
        $employee->email = $request->email;
        $employee->company_id = $request->companyId;
        $employee->phone = $request->phone;
        $employee->save();
        $success = 'Heiehi';

        return redirect()->route('employee.index')->with(['success' => 'Record has been updated!']);
    }


    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect(route('employee.index'));
    }
}
