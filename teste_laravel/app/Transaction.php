<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prize;
use App\Http\Controllers\TransactionController;

class Transaction extends Model
{
  public static function allTransactions(){
    $transactions = new TransactionController();
    echo $transactions::allTransactions();
  }

  public static function cumulativeGraph(){

  }

  public static function range($date, $finalDate){

  }

  public static function redeemed($names){
    $transactions = new TransactionController();

    if($names){
      foreach($transactions::redeemed() as $redeemed){
        echo $redeemed;
      }
    } else{
      $count = count($transactions::redeemed());
      $message = ($count == 1) ? 'prêmio' : 'prêmios';
      echo $count.' '.$message;
    }
  }

  public static function lastTenDays(){
    $transactions = new TransactionController();
    echo $transactions::lastTenDays();
  }
}
