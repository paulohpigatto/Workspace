<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Prize;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
  public static function allTransactions(){
    $earned = Transaction::where('recipient_id', Auth::id())->get();
    $spent = Transaction::where('sender_id', Auth::id())->get();
    $saldo = 0;

    foreach($earned as $earn){
      if($earn->transaction_type == 3){
        $saldo -= $earn->qtd;
      } else{
        $saldo += $earn->qtd;
      }
    }
    foreach($spent as $spend){
      if(Auth::user()->role != 2){
        $saldo -= $spend->qtd;
      }
    }

    return $saldo;
  }

  public static function cumulativeGraph(){

  }

  public static function redeemed(){
    $redeemed = Transaction::where('sender_id', Auth::id())->where('transaction_type', 2)->get();
    $prizes = array();

    foreach($redeemed as $redeem){
      $prize = Prize::findOrFail($redeem->prize_id);
      array_push($prizes, $prize->name);
    }
    return $prizes;
  }

  public static function lastTenDays(){
    $date = date('Y-m-d', strtotime ( '+1 day' , strtotime (date('Y-m-d'))));
    $unix = strtotime ( '-10 day' , strtotime ($date));
    $newDate = date('Y-m-d', $unix);
    $dateArray = array($newDate, $date);
    $lostValue = 0;

    $lost = Transaction::where('recipient_id', Auth::id())->where('transaction_type', 3)->whereBetween('created_at', array($dateArray))->get();

    foreach($lost as $value){
      $lostValue += $value->qtd;
    }

    if($lostValue){
      return "<span style='font-size:140px'>-".$lostValue."</span><h4 style='padding-left:8%'>Quotas perdidas nos últimos 10 dias</h4>";
    } else{
      return "<span style='font-size:140px;padding-left:8%;'>0</span><h4 style='padding-left:8%'>Nenhuma Quota perdida nos últimos 10 dias</h4>";
    }
  }
}
