<?php

namespace App\Http\Constants;

class ResponseMessage
{
    public static function SuccessMessage(): array
    {
        return [
            'status' => true,
            'title' => __('response-message.success_title'),
            'message' => __('response-message.success_message'),
        ];
    }

    public static function ErrorMessage(): array
    {
        return [
            'status' => false,
            'title' => __('response-message.error_title'),
            'message' => __('response-message.error_message'),
        ];
    }

    public static function IgnoreDateMessage(): array
    {
        return [
            'status' => false,
            'title' => __('response-message.ignore_date_title'),
            'message' => __('response-message.ignore_date_message'),
        ];
    }

    public static function CouponMessage(): array
    {
        return [
            'status' => false,
            'title' => __('response-message.coupon_title'),
            'message' => __('response-message.coupon_message'),
        ];
    }
}
