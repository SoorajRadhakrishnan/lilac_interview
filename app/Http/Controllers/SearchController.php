<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        // Initial load of employees for the index view
        $employees = User::join('departments', 'User.fk_department', '=', 'departments.id')
                         ->join('designations', 'User.fk_designation', '=', 'designations.id')
                         ->select('User.name', 'departments.name as department', 'designations.name as designation')
                         ->get();

        return view('search', compact('employees'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $employees = User::join('departments', 'User.fk_department', '=', 'departments.id')
                             ->join('designations', 'User.fk_designation', '=', 'designations.id')
                             ->select('User.name', 'departments.name as department', 'designations.name as designation')
                             ->where('User.name', 'like', '%' . $query . '%')
                             ->orWhere('departments.name', 'like', '%' . $query . '%')
                             ->orWhere('designations.name', 'like', '%' . $query . '%')
                             ->get();

            $output = '';
            if ($employees->count() > 0) {
                foreach ($employees as $employee) {
                    $output .= '
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">' . $employee->name . '</h5>
                                <p class="card-text">
                                    Designation: ' . ($employee->designation ?? 'N/A') . '<br>
                                    Department: ' . ($employee->department ?? 'N/A') . '
                                </p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                $output = '
                <div class="col-12">
                    <p class="text-center">No results found</p>
                </div>';
            }

            return response()->json(['card_data' => $output]);
        }
    }
}
