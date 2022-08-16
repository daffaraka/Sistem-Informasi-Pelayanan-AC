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

   public function store($id, Request $request)
   {
        $id_transaksi = Transaksi::find($id);

        Review::create(
            [
                'id_transaksi' => $id_transaksi->id_transaksi,
                'comment' => $request->comment,
                'rating' => $request->rating,
            ]
            );

        return redirect()->route('user.detailTransaksi-user',['id'=>$id_transaksi->id_transaksi]);
   }
}
