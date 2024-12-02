<?php

namespace App\Http\Controllers;

use App\BillPayment\EducationBillPay;
use App\Payment\PaymentMethod;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function hallo(Request $Request)
    {
        echo  "Hallo ini mahasiswa baru";
    }

    // public function index(PaymentMethod $payment)
    //public function index(EducationBillPay $payment)
    // public function index(PaymentMethod $paymentMethod, EducationBillPay $billpay)
    // {
    //     $paymentMethod->setMethod("Grreb Food");
    //     $billpay->pay();
    // }

    /**
     * example change to interface
     */

     public function index(PaymentMethod $payment){
        $payment->execute();
     }
}
