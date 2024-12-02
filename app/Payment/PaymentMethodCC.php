<?php   
        namespace App\Payment;

        class PaymentMethodCC implements PaymentMethod{
                public function inquiry()
                {

                }

                public function execute()
                {
                        dd(
                            "this is payment CC."
                        );
                }

                

        }