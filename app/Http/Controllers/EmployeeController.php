<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee1;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function fetchEmployees(Request $request)
    {
        $tables = ['employees_1', 'employees_2', 'employees_3'];

        $query = DB::table('employees_1')
        ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating');

        if ($request->department) {
            $query->whereIn('department', $request->department);
        }

        if ($request->job_title) {
            $query->whereIn('job_title', $request->job_title);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->hire_date_from && $request->hire_date_to) {
            $query->whereBetween('hire_date', [$request->hire_date_from, $request->hire_date_to]);
        }

        // Apply the same logic for the other tables using union
        foreach (['employees_2', 'employees_3'] as $table) {
            $subQuery = DB::table($table)
                ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating');

            if ($request->department) {
                $subQuery->whereIn('department', $request->department);
            }

            if ($request->job_title) {
                $subQuery->whereIn('job_title', $request->job_title);
            }

            if ($request->status) {
                $subQuery->where('status', $request->status);
            }

            if ($request->hire_date_from && $request->hire_date_to) {
                $subQuery->whereBetween('hire_date', [$request->hire_date_from, $request->hire_date_to]);
            }

            // Union with the main query
            $query->unionAll($subQuery);
        }

        $employees = DB::table(DB::raw("({$query->toSql()}) as temp_table"))->mergeBindings($query)  
                    ->paginate(10);

        return response()->json([
            'data' => $employees->items(),
            'links' => $employees->appends(request()->except('page'))->links('pagination::bootstrap-4')->render()
        ]);
    }
    public function show($id)
    {
        $tables = ['employees_1', 'employees_2', 'employees_3'];

        // Iterate through the tables and find the employee
        foreach ($tables as $table) {
            $employee = DB::table($table)
                ->where('id', $id)
                ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating')
                ->first();

            if ($employee) {
                return response()->json($employee); 
            }
        }

        return response()->json(['message' => 'Employee not found'], 404); 
    }
    public function export()
    {
       
        ini_set('memory_limit', '2G');
        set_time_limit(1200);
        
        $query = DB::table('employees_1')
        ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating')
        ->unionAll(DB::table('employees_2')
            ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating'))
        ->unionAll(DB::table('employees_3')
            ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating'))
        ->orderBy('id');  
    
    
        $query->chunk(1000, function ($employees) {
            return (new FastExcel($employees))->download('employees.xlsx');
        });

    }
}
