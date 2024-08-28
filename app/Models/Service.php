<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'des', 'price', 'promotional_price', 'exp_date', 'status', 'infomation', 'feature_image'];

    public static function getAllServices()
    {
        return self::orderBy('id', 'DESC')->get();
    }

    public static function createService($data, $imageFile)
    {
        if ($imageFile) {
            $data['feature_image'] = self::uploadImage($imageFile);
        }
        return self::create($data);
    }

    public static function getServiceById($id)
    {
        return self::find($id);
    }

    public static function updateService($id, $data, $imageFile)
    {
        $service = self::find($id);
        if ($imageFile) {
            $data['feature_image'] = self::uploadImage($imageFile);
        }

        $service->update($data);
        return $service;
    }

    public static function deleteService($id)
    {
        return self::destroy($id);
    }

    private static function uploadImage($imageFile)
    {
        $path = 'uploads/services/';
        $get_name_image = $imageFile->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $imageFile->getClientOriginalExtension();
        $imageFile->move($path, $new_image);
        return $new_image;
    }
    public static function filterServices($minSalary, $maxSalary, $jobTypes)
    {
        $query = self::whereBetween('price', [$minSalary, $maxSalary]);

        if (!empty($jobTypes)) {
            $query->whereIn('name', $jobTypes);
        }

        return $query->orderBy('id', 'DESC')->get();
    }
}
