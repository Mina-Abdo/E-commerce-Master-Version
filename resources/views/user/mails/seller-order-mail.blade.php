<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

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
            border-collapse: collapse;
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

        .products th td {
            border-bottom: 1px solid #ddd;
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
    </style>
</head>

<body>
    <h1>Invoice</h1><br><br>

    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('frontend-assets/images/icons/logo-01.png')}}" alt="Company logo" style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Order #: {{ $sellerMailData->getOrderCode() }}<br />
                                Created: {{ $sellerMailData->getOrderCreationDate()}}<br />
                                Due: {{ $sellerMailData->getOrderDeliveryDate()}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <p>
                                    {{ $sellerMailData->getWebsiteName() }}
                                </p>
                                <p>
                                    {{ $sellerMailData->getWebsiteAddress() }}
                                </p>
                                <p>
                                    {{ $sellerMailData->getWebsiteEmail() }}
                                </p>
                            </td>

                            <td>
                                <p>
                                    Billed to:
                                </p>
                                <p>
                                    {{ $sellerMailData->getUserName() }}
                                </p>
                                <p style="font-size: 1.3rem">
                                    {{ $sellerMailData->getUserAddress() }}

                                </p>
                                <p>
                                    {{ $sellerMailData->getUserEmail() }}

                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Payment Method</td>
                <td>COD</td>
            </tr>
        </table>
        <br /><br />
        <h3 style="text-align: start;">Details</h3>
        <table class="products">
            <thead>
                <tr class="heading">
                    <th style="text-align: center;"> Code </th>
                    <th style="text-align: center;"> product name </th>
                    <th style="text-align: center;"> quantity </th>
                    <th style="text-align: center;"> stock </th>
                    <th style="text-align: center;"> sale price </th>
                    <th style="text-align: center;"> total </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($seller->getProducts() as $product)
                    <tr class="item">
                        <td style="text-align: center;"> {{ $product->getCode() }} </td>
                        <td style="text-align: center;">
                            <p>{{ $product->getName() }}</p>
                        </td>
                        <td style="text-align: center;">
                            <p>
                                {{ $product->getQuantity() }}
                            </p>
                        </td>
                        <td style="text-align: center;">
                            {{ $product->getStock() }}
                        </td>
                        <td style="text-align: center;">
                            {{ $product->getPrice() }}
                        </td>
                        <td style="text-align: center;">
                            <p>
                                {{ $product->getQuantity() * $product->getPrice() }}
                            </p>
                        </td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Sub Total</th>
                    <td style="text-align: center;">{{ $seller->getSubTotal() }}</td>
                </tr class="total">
                <!-- end tr -->
                @if ($sellerMailData->getCoupon())
                    <tr class="total">
                        <td colspan="4"> </td>
                        <th>Coupon applied :</th>
                        <td style="text-align: center;">{{$sellerMailData->getCoupon()->code}}</td>
                    </tr>
                @endif
                <!-- end tr -->
                @if ($sellerMailData->getCoupon())
                    <tr class="total">
                        <td colspan="4"> </td>
                        <th>Discount :</th>
                        <td style="text-align: center;">- {{ $seller->getSubtotal() * $seller->getDiscount() }}</td>
                    </tr>
                @endif

                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Shipping Charge :</th>
                    <td style="text-align: center;">{{$seller->getShipping()}} </td>
                </tr>
                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Total</th>
                    <td style="text-align: center;">{{$seller->getTotal()}} </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
