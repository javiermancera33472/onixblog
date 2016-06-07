<?php

class jmHelper
{ 
    
    function prepareEmail($user,$templateId,$extraValues)
    {
 
        $email = \App\EmailTemplates::find($templateId);
        $my_html = $email->templateContent_en;
        $my_html = str_replace('[TODAY_DATE_MONTH DD, YYYY]',date("F d, Y"),$my_html);
        $subject = $email->subject_en;
        foreach (config('jmSettings') as $key => $val)
        {
            $field = "[".strtoupper($key) . "]";
            $my_html = str_replace($field,$val,$my_html);
            $subject = str_replace($field,$val,$subject);
        }

        
        foreach ($user['attributes'] as $key => $val)
        {

            $k = "[".strtoupper($key) . "]";
            $my_html = str_replace($k,$val,$my_html);
            $subject = str_replace($k,$val,$subject);
        }
        
        foreach ($extraValues as $key => $val)
        {
            $k = "[".strtoupper($key) . "]";
            $my_html = str_replace($k,$val,$my_html);
            $subject = str_replace($k,$val,$subject);
        }

        $mail = new PHPMailer();
        $cust_email = $user->email;
        $cust_name = $user->first_name;
        $emailFrom = config('jmSettings')['JM_EMAIL_FROM'];
        $emailFromName = config('jmSettings')['JM_EMAIL_FROM_NAME'];
        $mail->From = $emailFrom;
        $mail->FromName = $emailFromName;
        $mail->AddReplyTo($emailFrom, $emailFromName);

        if (config('jmSettings')['JM_IS_TESTING'] == 1)
        {
            $my_subject = "testing environment target email was .. " . $cust_email . "<br><br>" .  $subject ;
            $cust_email = "jmancera@gmail.com";
            $cust_name = "testing environment";
        }    
        $mail->AddAddress($cust_email , $cust_name);
        $mail->AddBCC("jmancera@gmail.com" , "testing Email");
        $mail->AddBCC("support@mdsummerschool.com" , "support Email");
        $mail->AddBCC("bbookser@materdeicatholic.org" , "support Email");
        $mail->WordWrap = 50;                                 // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $my_html ;
        //$mail->AddAttachment($fileToAttach);  
        if(!$mail->Send())
        {

        }    

    }
}

