<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   public function buatReview($id)
   {
        Transaksi::find($id);

        return view('dashboard.admin.reviews.review-index');
   }
}
