<?php

namespace App\Services\Payment;

use App\Models\CompanyInfo;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\PaymentPlan;
use App\Models\UserInfo;

class PayService
{

    public function pay()
    {
        $requestIyzico = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $cart = session('cart');
        $user = auth()->user();
        $info = UserInfo::where('userId', auth()->id())->first();
        $company = CompanyInfo::where('companyId', companyId(), $cart['couponId'])->first();

        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setConversationId(rand());
        $requestIyzico->setPrice(number_format($cart['price'], '2', '.', ''));
        $requestIyzico->setPaidPrice(number_format($cart['total_amount'], '2', '.', ''));
        $requestIyzico->setCurrency(\Iyzipay\Model\Currency::TL);
        $requestIyzico->setBasketId("B67832");
        $requestIyzico->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $requestIyzico->setCallbackUrl(route('manager.pay.callback', ['companyId' => companyId(), 'couponId' => $cart['couponId']]));
        $requestIyzico->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId(rand());
        $buyer->setName($user->name);
        $buyer->setSurname($user->surname);
        $buyer->setGsmNumber($info->phone);
        $buyer->setEmail($user->email);
        $buyer->setIdentityNumber(rand());
        $buyer->setLastLoginDate((string)now());
        $buyer->setRegistrationDate((string)$user->created_at);
        $buyer->setRegistrationAddress($info->address);
        $buyer->setIp(request()->ip());
        $buyer->setCity('Karaman');
        $buyer->setCountry('Turkey');
        $buyer->setZipCode('70100');
        $requestIyzico->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($user->name . ' ' . $user->surname);
        $shippingAddress->setCity('Karaman');
        $shippingAddress->setCountry('Turkey');
        $shippingAddress->setAddress($info->address);
        $shippingAddress->setZipCode('70100');
        $requestIyzico->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($user->name . ' ' . $user->surname);
        $billingAddress->setCity('karaman');
        $billingAddress->setCountry('karaman');
        $billingAddress->setAddress($company->address);
        $billingAddress->setZipCode($company->zip_code);
        $requestIyzico->setBillingAddress($billingAddress);

        $basketItems = array();
        $BasketItem = new \Iyzipay\Model\BasketItem();
        $BasketItem->setId(rand());
        $BasketItem->setName("Ehliyet Sürücü Kurs Yönetim Sistemi");
        $BasketItem->setCategory1("Yazılım");
        $BasketItem->setCategory2("Kurs Yönetim Sistemi");
        $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $BasketItem->setPrice(number_format($cart['price'], '2', '.', ''));
        $basketItems[] = $BasketItem;
        $requestIyzico->setBasketItems($basketItems);

        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($requestIyzico, self::options());
        $paymentForm = $checkoutFormInitialize->getCheckoutFormContent();
        return $paymentForm;
    }

    public function options(): \Iyzipay\Options
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));
        return $options;
    }

    public function paySuccess($id, $couponId, $paymentId = null)
    {
        $cart = session('cart');
        $payment = PaymentMethod::where('code', 'online')->first();
        $invoice = Invoice::where('companyId', $id)->orderBy('id', 'desc')->first();
        $company = CompanyInfo::where('companyId', $id)->first();
        $paymentPlan = PaymentPlan::find($company->planId);

        $invoice->status = true;
        $invoice->discount_amount = $cart['discount'];
        $invoice->total_amount = $cart['total_amount'];
        $invoice->start_date = now();
        $invoice->end_date = now()->addMonths($paymentPlan->month);
        $invoice->couponId = $couponId;
        $invoice->paymentId = $paymentId ?? $payment->id;
        $invoice->save();
    }
}
