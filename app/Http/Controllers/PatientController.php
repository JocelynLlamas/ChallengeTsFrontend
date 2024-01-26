<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller
{
    public function getFlexibility(Request $request)
    {
        $gender = $request->input('gender');
        $weight = $request->input('weight');
        $shoeSize = (int) $request->input('shoeSize');

        $flexibility = $this->calculateFlexibility($gender, $weight, $shoeSize);

        return response()->json(['flexibility' => $flexibility]);
    }

    private function calculateFlexibility($gender, $weight, $shoeSize)
    {

        $rules = [
            // minWeight, maxWeight, minSize, maxSize, flexibility
            'female' => [
                [0, 79, 5, 15, 'semiflex'],
                [80, 99, 5, 13, 'semiflex'],
                [100, 119, 5, 11, 'semiflex'],
                [120, 139, 5, 9, 'semiflex'],
                [140, 159, 5, 7, 'semiflex'],
                [160, 179, 5, 5, 'semiflex'],
                [0, 79, 16, 16, 'semi-rigid'],
                [80, 99, 14, 16, 'semi-rigid'],
                [100, 119, 12, 16, 'semi-rigid'],
                [120, 139, 10, 16, 'semi-rigid'],
                [140, 159, 8, 14, 'semi-rigid'],
                [160, 179, 6, 12, 'semi-rigid'],
                [180, 199, 5, 10, 'semi-rigid'],
                [200, 219, 5, 8, 'semi-rigid'],
                [220, 239, 5, 6, 'semi-rigid'],
                [140, 159, 15, 16, 'rigid'],
                [160, 179, 13, 16, 'rigid'],
                [180, 199, 11, 16, 'rigid'],
                [200, 219, 9, 16, 'rigid'],
                [220, 239, 7, 16, 'rigid'],
                [240, 299, 5, 16, 'rigid'],
                [300, 319, 5, 14, 'rigid'],
                [320, 339, 15, 12, 'rigid'],
                [360, 400, 5, 5, 'rigid'],
                [300, 319, 15, 16, 'ultra-rigid'],
                [320, 339, 13, 16, 'ultra-rigid'],
                [340, 359, 11, 16, 'ultra-rigid'],
                [360, 400, 6, 16, 'ultra-rigid'],
            ],
            'male' => [
                [0, 79, 6, 13, 'semiflex'],
                [80, 99, 6, 11, 'semiflex'],
                [100, 119, 6, 9, 'semiflex'],
                [120, 139, 6, 7, 'semiflex'],
                [0, 79, 14, 17, 'semi-rigid'],
                [80, 99, 12, 17, 'semi-rigid'],
                [100, 119, 10, 16, 'semi-rigid'],
                [120, 139, 8, 14, 'semi-rigid'],
                [140, 159, 6, 12, 'semi-rigid'],
                [160, 179, 6, 10, 'semi-rigid'],
                [180, 199, 6, 8, 'semi-rigid'],
                [200, 219, 6, 6, 'semi-rigid'],
                [100, 119, 17, 17, 'rigid'],
                [120, 139, 15, 17, 'rigid'],
                [140, 159, 13, 17, 'rigid'],
                [160, 179, 11, 17, 'rigid'],
                [180, 199, 9, 17, 'rigid'],
                [200, 219, 7, 17, 'rigid'],
                [220, 259, 6, 17, 'rigid'],
                [260, 279, 6, 16, 'rigid'],
                [280, 299, 6, 14, 'rigid'],
                [300, 329, 6, 12, 'rigid'],
                [340, 359, 6, 8, 'rigid'],
                [260, 279, 17, 17, 'ultra-rigid'],
                [280, 299, 15, 17, 'ultra-rigid'],
                [300, 319, 13, 17, 'ultra-rigid'],
                [320, 339, 11, 17, 'ultra-rigid'],
                [340, 359, 9, 17, 'ultra-rigid'],
                [360, 400, 6, 17, 'ultra-rigid'],
            ],
        ];

        foreach ($rules[$gender] as $rule) {
            
            //break down elements from $rules
            list($minWeight, $maxWeight, $minSize, $maxSize, $flexibility) = $rule;

            if ($weight >= $minWeight && $weight < $maxWeight && $shoeSize >= $minSize && $shoeSize <= $maxSize) {
                return $flexibility;
            }
        }
    }
}
