<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Fatura</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('images/codenteq-logo.png')}}"
                                 style="width: 100%; max-width: 300px"/>
                        </td>

                        <td>
                            Fatura No #: {{$invoice->id}}<br/>
                            Oluşturma: {{$invoice->created_at->format('d-m-Y')}}<br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{$invoice->company->title}}.<br/>
                            {{$invoice->company->info->address}}
                        </td>

                        <td>
                            {{$user->name .' '. $user->surname}}<br>
                            {{$invoice->company->info->email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Ödeme Yöntemi</td>

            <td></td>
        </tr>

        <tr class="details">
            <td>{{$invoice->payment->title}}</td>
            <td></td>
        </tr>

        <tr class="heading">
            <td>Ürün</td>

            <td>Fiyat</td>
        </tr>

        <tr class="item">
            <td>{{$invoice->package->title}}</td>

            <td>{{$invoice->price}}</td>
        </tr>

        <tr class="item">
            <td>İndirim Tutarı</td>

            <td>{{$invoice->discount_amount ?? 0}}</td>
        </tr>

        <tr class="Fiyat">
            <td></td>

            <td>Toplam: {{$invoice->total_amount}} TL</td>
        </tr>
    </table>
</div>
</body>
</html>
