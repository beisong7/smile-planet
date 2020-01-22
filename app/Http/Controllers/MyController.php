<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function sendEmail($object){



        $to = $object['email'];
        $subject = $object['subject'];

        $fromMail = 'SmilePlanetEF <noreply@smileplanetef.org> ';
        $htmlContent = view($object['view'])
            ->with('title',$object['title'])
            ->with('content', $object['content']);

        $headersMail = '';
        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Smile Planet HUB \r\n";
        $headersMail .= 'MIME-Version: 1.0' . "\r\n";
        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headersMail .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";

        @mail($to,$subject,$htmlContent, $headersMail);
    }
}
