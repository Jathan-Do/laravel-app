<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Truy vấn dữ liệu từ bảng services
        $services = Service::getAllServices();
        // Trả về view home và truyền dữ liệu services vào view
        return view('homepage', compact('services'));
    }
    public function filter(Request $request)
    {
        $minSalary = $request->input('min_salary', 10000);
        $maxSalary = $request->input('max_salary', 50000000);
        $jobTypes = $request->input('job_types', []);

        // Gọi hàm filter từ model
        $services = Service::filterServices($minSalary, $maxSalary, $jobTypes);
        // Trả về view homepage và truyền dữ liệu services vào view
        return view('homepage', compact('services'));
    }
    public function detail(){
        return view('detail');
    }
}
