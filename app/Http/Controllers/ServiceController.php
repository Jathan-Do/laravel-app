<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:200',
                'des' => 'required|max:200',
                'price' => 'required',
                'promotional_price' => 'required',
                'exp_date' => 'required',
                'status' => 'required',
                'infomation' => 'required',
                'feature_image' => 'required',
            ],
            [
                // 'name.unique' => 'Name is duplicated',
            ],
        );
        $service = new Service();
        $service->name = $data['name'];
        $service->des = $data['des'];
        $service->price = $data['price'];
        $service->promotional_price = $data['promotional_price'];
        $service->exp_date = $data['exp_date'];
        $service->status = $data['status'];
        $service->infomation = $data['infomation'];

        $get_image = $request->file('feature_image');
        $path = 'uploads/services/';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $service->feature_image = $new_image;
        }
        $service->save();
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);
        return view('edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:200',
                'des' => 'required|max:200',
                'price' => 'required',
                'promotional_price' => 'required',
                'exp_date' => 'required',
                'status' => 'required',
                'infomation' => 'required',
            ],
            [
                // 'name.unique' => 'Name is duplicated',
            ],
        );
        $service = Service::find($id);
        $service->name = $data['name'];
        $service->des = $data['des'];
        $service->price = $data['price'];
        $service->promotional_price = $data['promotional_price'];
        $service->exp_date = $data['exp_date'];
        $service->status = $data['status'];
        $service->infomation = $data['infomation'];

        $get_image = $request->file('feature_image');
        $path = 'uploads/services/';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $service->feature_image = $new_image;
        }
        $service->save();
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index');
    }
}
