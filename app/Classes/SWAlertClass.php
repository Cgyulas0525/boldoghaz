<?php
namespace App\Classes;

use URL;
use Alert;

Class SWAlertClass {

    public static function choice($id, $title, $cancelPath, $cancelText, $confirmPath, $confirmText)
    {
        Alert::question( $title )
            ->showCancelButton(
                $btnText = '<a class="swCancelButton" href="'. URL::asset($cancelPath) .'">' . $cancelText .'</a>',
                $btnColor = '#ff0000')
            ->showConfirmButton(
                $btnText = '<a class="swConfirmButton" href="'. URL::asset($confirmPath) .'">' . $confirmText .'</a>', // here is class for link
                $btnColor = '#0066cc',
            )->autoClose(false);
    }

    public static function error( $title, $text)
    {
        Alert::error( $title, $text )->autoClose(false);
    }
}

