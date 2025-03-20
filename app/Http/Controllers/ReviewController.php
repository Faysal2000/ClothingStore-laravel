<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{


    public function storeReview(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:1000',
            'message' => 'required|string|max:1000',
        ]);

        // إنشاء وحفظ المراجعة مباشرة  
        Review::create($validatedData);

        return redirect('/reviews')->with('success', 'تمت إضافة المراجعة بنجاح!');
    }
}
