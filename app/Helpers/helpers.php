<?php

use App\Models\GeneralSetting;
use App\Models\SocialNetwork;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if( !function_exists('sendEmail')) {
    function sendEmail($mailConfig){
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/src/Exception.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = env('EMAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('EMAIL_USERNAME');
        $mail->Password = env('EMAIL_PASSWORD');
        $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
        $mail->Port = env('EMAIL_PORT');
        $mail->setFrom($mailConfig['mail_from_email'],$mailConfig['mail_from_name']);
        $mail->addAddress($mailConfig['mail_recipient_email'],$mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body = $mailConfig['mail_body'];
        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }
}

if( !function_exists('get_settings')){
    function get_settings(){
        $results = null;
        $settings = new GeneralSetting();
        $settings_data = $settings->first();

        if($settings_data){
            $results = $settings_data;
        }else{
            $settings->insert([
                'site_name'  => 'Laravel Ecommerce v10',
                'site_email' => 'admin@gmail.com'
            ]);
            $new_settings_data = $settings->first();
            $results = $new_settings_data;
        }

        return $results;
    }
}

if( !function_exists('get_social_networks')){
    function get_social_networks(){
        $results = null;
        $social_network = new SocialNetwork();
        $social_network_data = $social_network->first();

        if($social_network_data){
            $results = $social_network_data;
        }else{
            $social_network->insert([
                'facebook_url'  => null,
                'twitter_url'   => null,
                'instagram_url' => null,
                'youtube_url'   => null,
                'github_url'    => null,
                'linkedin_url'  => null,
            ]);
            $new_social_network_data = $social_network->first();
            $results = $new_social_network_data;
        }

        return $results;
    }
}
