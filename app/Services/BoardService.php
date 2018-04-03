<?php

namespace App\Services;
use App\Board;

class BoardService 
{
  public function show($id)
  {
    return Board::find($id);
  }
}


// public function make(CreateCoupon $request)
// {
//    $coupon = \App\Coupon::create([
//      'code' => $request->get('code'),
//      'amount' => $request->get('amount'),
//      'max_redemptions' => $request->get('max_redemptions')
//    ]);
//    return $coupon;
// }
