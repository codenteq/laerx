<?php

namespace App\Http\Constants;

class ResponseMessage
{
    const SuccessMessage = [
        'status' => true,
        'title' => 'Başarılı',
        'message' => 'İşleminiz başarılı bir şekilde gerçekleştirildi'
    ];
    const ErrorMessage = [
        'status' => false,
        'title' => 'Başarısız',
        'message' => 'İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz'
    ];
}
