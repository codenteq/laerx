<?php

namespace App\Http\Constants;

class ResponseMessage
{
    const SuccessMessage = [
        'status' => true,
        'title' => 'Başarılı',
        'message' => 'İşleminiz başarılı bir şekilde gerçekleştirildi.'
    ];
    const ErrorMessage = [
        'status' => false,
        'title' => 'Başarısız',
        'message' => 'İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.'
    ];

    const IgnoreDateMessage = [
        'status' => false,
        'title' => 'Başarısız',
        'message' => 'Bu randevu tarihi seçilemez. Lütfen yeni bir tarih seçiniz.'
    ];

    const CouponMessage = [
        'status' => false,
        'title' => 'Başarısız',
        'message' => 'Kupon kodu geçersiz.'
    ];
}
