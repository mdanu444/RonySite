<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function generate()
    {
        // ১. ইমেজের আকার (টেক্সট বড় করার জন্য সাইজ বাড়ানো হয়েছে)
        $width = 205;
        $height = 65;
        $image = imagecreatetruecolor($width, $height);

        // ২. কালার সেটআপ
        $bgColor = imagecolorallocate($image, 224, 241, 241); // হালকা নীল ব্যাকগ্রাউন্ড
        $textColor = imagecolorallocate($image, 101, 152, 223); // গাঢ় নীল টেক্সট (বেশি স্পষ্ট)
        $noiseColor = imagecolorallocate($image, 136, 174, 222); // হালকা নীল নয়েজ ডট

        // অ্যান্টি-অ্যালিয়াসিং অন করা (যাতে বৃত্ত ও টেক্সট মসৃণ হয়)
        imageantialias($image, true);
        imagefill($image, 0, 0, $bgColor);

        // ৩. ক্যাপচা টেক্সট তৈরি (৬ অক্ষরের)
        $permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $captcha_text = substr(str_shuffle($permitted_chars), 0, 6);
        Session::put('captcha_text', "");
        Session::put('captcha_text', $captcha_text);

        // ৪. টেক্সট রেন্ডারিং (Arial Bold ব্যবহার করে)
        $font_path = public_path('fonts/arialceb.ttf'); // Arial Bold ফন্ট পাথ
        $fontSize = 23; // ফন্ট সাইজ বড় করা হয়েছে

        if (file_exists($font_path)) {
            for ($i = 0; $i < strlen($captcha_text); $i++) {
                $angle = mt_rand(-7, 7); // টেক্সট বাঁকা করা
                $x_pos = 13 + ($i * 30);   // অক্ষরের মাঝে গ্যাপ (Spacing)
                $y_pos = 45;               // টেক্সটের উচ্চতা
                imagettftext($image, $fontSize, $angle, $x_pos, $y_pos, $textColor, $font_path, $captcha_text[$i]);
            }
        } else {
            // ফন্ট না পেলে এরর মেসেজ (টেস্টিং এর জন্য)
            imagestring($image, 5, 10, 30, "Font Not Found!", $textColor);
        }

        // ৫. গোলাকার ডটেড নয়েজ (Circle Shape Noise)
        // ক) সাধারণ নীল রঙের বিন্দু
        for ($i = 0; $i < ($width * 7.75); $i++) {
            $x = mt_rand(.05, $width);
            $y = mt_rand(.05, $height);
            $size = mt_rand(1, 1.6); // বিন্দুর সাইজ (বড় বৃত্ত)
            imagefilledellipse($image, $x, $y, $size, $size, $noiseColor);
        }

        // খ) টেক্সটের ওপর ব্যাকগ্রাউন্ড কালারের বিন্দু (Overlap effect)
        // এটি টেক্সটকে বটের কাছে অস্পষ্ট কিন্তু মানুষের কাছে পাঠযোগ্য করবে
        for ($i = 0; $i < 430; $i++) {
            $x = mt_rand(.1, $width);
            $y = mt_rand(.1, $height);
            $size = mt_rand(1, 1.6);
            imagefilledellipse($image, $x, $y, $size, $size, $bgColor);
        }


        \Session::save();

        // ৬. আউটপুট PNG ফরম্যাটে
        header('Content-Type: image/png');
        header('Cache-Control: no-cache, must-revalidate');
        imagepng($image);
        imagedestroy($image);
        exit;
    }
}
