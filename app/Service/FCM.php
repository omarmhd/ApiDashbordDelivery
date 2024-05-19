<?php

use App\Models\UserDevice;

class FCM{


    public function send($user_id,$status,$obj)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = UserDevice::where(['user_id'=>$user_id])->pluck('token')->all();

        $serverKey = 'AAAA1eitYx0:APA91bHi2EulpeJgGX0OfDwRxsfAs9BWjA2zJkq-DlNnG_5nKlY3TJkR0YAaW4XkbpgE0FArYm_1KoiGSW5IqyxGMwg0OJXIHRg506f6V2oRkxil87V_ub56k5cV4X6UxfMoPREEm1Xz';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => $this->getMessageByStatus($status,$obj),
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        // dd($result);
    }


    public function getMessageByStatus($status,$obj)
    {

        if($status == 'IN_WAY'){
            return [
                'title'=>'تم توصيل الطلب رقم'.$obj->getKey(),
                'body'=>'تم توصيل الطلب بنجاح',
                'status'=>$status,
            ];
        }elseif($status == 'IN_LOCATION'){
            return [
                'title'=>'طلبكم في الطريق اليكم'.$obj->getKey(),
                'body'=>'تم توصيل الطلب بنجاح',
                'status'=>$status,
            ];
        }elseif($status == 'GET_ORDER'){
            return [
                'title'=>'تم توصيل الطلب رقم'.$obj->getKey(),
                'body'=>'تم توصيل الطلب بنجاح',
                'status'=>$status,
            ];
        }elseif($status == 'COUPON'){
            return [
                'title'=>'كوبون',
                'body'=>'تم تفعيل الكوبون',
                'status'=>$status,
            ];
        }
        return [
            'title'=>'',
            'body'=>'',
            'status'=>$status,
        ];
    }
}
