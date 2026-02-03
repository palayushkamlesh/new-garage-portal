<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Customers;
use App\Models\Cars;
use App\Models\Employees;
use App\Models\Parts;
use App\Models\Jobs;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
    public function index()
{
    $totalUsers = Users::count();
    $totalCustomers = Customers::count();
    $monthlyCustomers = Customers::whereMonth('created_at', Carbon::now()->month)->count();
    $totalCars = Cars::count();
    $totalEmployees = Employees::count();
    $totalParts = Parts::count();
    $activeParts = Parts::where('status', 'active')->count();
    $inactiveParts = Parts::where('status', 'inactive')->count();
     
    //diagrams
     $jobStatusData = Jobs::select('status', \DB::raw('count(*) as total'))
     ->groupBy('status')
     ->pluck('total', 'status');

     $monthlyJobData = DB::table('jobs')
    ->select(DB::raw("DATE_FORMAT(created_at, '%b %Y') as month"), DB::raw('count(*) as count'))
    ->groupBy('month')
    ->orderByRaw("MIN(created_at)")
    ->pluck('count', 'month');

    $jobPerEmployee = DB::table('jobs')
    ->join('employees', 'jobs.employee_id', '=', 'employees.id')
    ->select('employees.name as employee', DB::raw('count(jobs.id) as count'))
    ->groupBy('employees.name')
    ->pluck('count', 'employee');

// Count of active/inactive job parts
$activePartsCount = DB::table('job_part')->where('status', 'active')->count();
$inactivePartsCount = DB::table('job_part')->where('status', 'inactive')->count();

// Count parts in jobs with status "completed" or "in-progress"
$partsInCompletedJobs = DB::table('job_part')
    ->join('jobs', 'job_part.job_id', '=', 'jobs.id')
    ->where('jobs.status', 'completed')
    ->count();

$partsInInProgressJobs = DB::table('job_part')
    ->join('jobs', 'job_part.job_id', '=', 'jobs.id')
    ->where('jobs.status', 'in-progress')
    ->count();

    $topParts = DB::table('job_part')
        ->join('parts', 'job_part.part_id', '=', 'parts.id')
        ->select('parts.name', DB::raw('SUM(job_part.quantity) as total_used'))
        ->groupBy('parts.name')
        ->orderByDesc('total_used')
        ->limit(5)
        ->pluck('total_used', 'parts.name');

        $monthlyRevenue = DB::table('jobs')
        ->join('job_part', 'jobs.id', '=', 'job_part.job_id')
        ->select(
            DB::raw("DATE_FORMAT(jobs.created_at, '%b') as month"),
            DB::raw("SUM(job_part.total) as revenue")
        )
        ->groupBy('month')
        ->orderByRaw("STR_TO_DATE(month, '%b')")
        ->pluck('revenue', 'month');





    return view('admindashboard.index', compact(
        'totalUsers', 'totalCustomers', 'monthlyCustomers', 'totalCars', 'totalEmployees',
         'activeParts', 'inactiveParts','jobStatusData','monthlyJobData','jobPerEmployee','activePartsCount','inactivePartsCount',
         'partsInCompletedJobs','partsInInProgressJobs','topParts','monthlyRevenue',
    ));
}

    
    public function togglePartStatus($id)
    {
        $part = Parts::findOrFail($id);
        $part->status = $part->status === 'active' ? 'inactive' : 'active';
        $part->save();
        
        return response()->json(['message' => 'Part status updated successfully']);
    }
}
