<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        @media (max-width:660px) {
            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .row-content {
                width: 100% !important;
            }

            .stack .column {
                width: 100%;
                display: block;
            }
        }

    </style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
        <tbody>
            <tr>
                <td>
                    {{-- mã ngày tháng --}}
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #8cc0e8; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="33.333333333333336%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="width:100%;padding-right:0px;padding-left:0px;padding-top:25px;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        alt="Image"
                                                                        src="{{ asset('image/mail/icon-01_2.png') }}"
                                                                        style="display: block; height: auto; border: 0; width: 24px; max-width: 100%;"
                                                                        title="Image" width="24" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:25px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            Mã :</p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>{{ $bills->code_bill }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="33.333333333333336%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="width:100%;padding-right:0px;padding-left:0px;padding-top:25px;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        alt="Image"
                                                                        src="{{ asset('image/mail/icon-02_2.png') }}"
                                                                        style="display: block; height: auto; border: 0; width: 22px; max-width: 100%;"
                                                                        title="Image" width="22" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:25px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            Ngày tạo :</p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>
                                                                                {{ date('d-m-Y H:i', strtotime($bills->created_at)) }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="33.333333333333336%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="image_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="width:100%;padding-right:0px;padding-left:0px;padding-top:25px;">
                                                                <div align="center" style="line-height:10px"><img
                                                                        alt="Image"
                                                                        src="{{ asset('image/mail/icon-03_2.png') }}"
                                                                        style="display: block; height: auto; border: 0; width: 25px; max-width: 100%;"
                                                                        title="Image" width="25" /></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:25px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            Tổng tiền :</p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>
                                                                                {{ number_format($bills->total_money, 0, ',', '.') }}
                                                                                VND
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5c98c7; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 30px; padding-right: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="66.66666666666667%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-left:10px;padding-right:10px;padding-top:30px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: left;">
                                                                            <span style="font-size:20px;">
                                                                                <strong>Khách hàng:
                                                                                    <span> {{ $name_customer }}</span>
                                                                                </strong>
                                                                            </span>
                                                                        </p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: left;">
                                                                            <span style="font-size:20px;">
                                                                                Bạn có đơn hàng cần xác nhận !!
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:30px;padding-left:10px;padding-right:10px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: left;">
                                                                            @foreach ($city_provinces as $city_province)
                                                                                @if ($city_province->matp == $bills->city_province)
                                                                                    {{ $city_province->name }}
                                                                                @endif
                                                                            @endforeach
                                                                            -
                                                                            @foreach ($districts as $district)
                                                                                @if ($district->maqh == $bills->district)
                                                                                    {{ $district->name }}
                                                                                @endif
                                                                            @endforeach
                                                                            -
                                                                            @foreach ($commune_ward_towns as $commune_ward_town)
                                                                                @if ($commune_ward_town->xaid == $bills->commune_ward_town)
                                                                                    {{ $commune_ward_town->name }}
                                                                                @endif
                                                                            @endforeach
                                                                        </p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: left;">
                                                                            Địa chỉ chi tiết :</p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: left;">
                                                                            {{ $bills->detailed_address }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="33.333333333333336%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:45px;padding-left:10px;padding-right:10px;padding-top:50px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            Số tiền thanh toán :</p>
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>
                                                                                {{ number_format($bills->total_money, 0, ',', '.') }}
                                                                                VND
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- tên cột --}}
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #6da3cd; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="25%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>#</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="25%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>Tên sản phẩm</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="25%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>Số lượng</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="25%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center;">
                                                                            <strong>Tổng giá</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- item san pham --}}
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($carts_pros as $carts_pro)

                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7"
                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                                            class="row-content" role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5c98c7; color: #000000; width: 640px;"
                                            width="640">
                                            <tbody>
                                                <tr>
                                                    <td class="column"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 1px solid #6DA3CD; border-top: 0px; border-right: 0px; border-left: 0px;"
                                                        width="25%">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                                <td
                                                                    style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div
                                                                            style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                            <p
                                                                                style="margin: 0; font-size: 14px; text-align: center;">
                                                                                {{ $stt++ }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="column"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 1px solid #6DA3CD; border-top: 0px; border-right: 0px; border-left: 0px;"
                                                        width="25%">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                                <td
                                                                    style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div
                                                                            style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                            <p
                                                                                style="margin: 0; font-size: 14px; text-align: center;">
                                                                                {{ $carts_pro->name }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="column"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 1px solid #6DA3CD; border-top: 0px; border-right: 0px; border-left: 0px;"
                                                        width="25%">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                                <td
                                                                    style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div
                                                                            style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                            <p
                                                                                style="margin: 0; font-size: 14px; text-align: center;">
                                                                                {{ $carts_pro->qty }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="column"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 1px solid #6DA3CD; border-top: 0px; border-right: 0px; border-left: 0px;"
                                                        width="25%">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                                <td
                                                                    style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div
                                                                            style="font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                            <p
                                                                                style="margin: 0; font-size: 14px; text-align: center;">
                                                                                {{ number_format($carts_pro->price * $carts_pro->qty, 0, ',', '.') }}
                                                                                VND
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach

                    {{-- total --}}
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-10"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5c98c7; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="50%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:40px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 30px;">
                                                                            <span style="font-size:16px;">


                                                                                Phương thức thanh toán:</span>
                                                                            <br />
                                                                            <span style="font-size:20px;">
                                                                                <strong>

                                                                                    @if ($bills->code_bill = 'off')
                                                                                        Thanh toán khi nhận hàng
                                                                                    @else
                                                                                        Thanh toán onile
                                                                                    @endif
                                                                                </strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="50%">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        class="text_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                        width="100%">
                                                        <tr>
                                                            <td
                                                                style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:30px;">
                                                                <div style="font-family: sans-serif">
                                                                    <div
                                                                        style="font-size: 14px; mso-line-height-alt: 25.2px; color: #ffffff; line-height: 1.8; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                        <p
                                                                            style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 28.8px;">
                                                                            <span style="font-size:16px;">
                                                                                Tổng chưa thuế:
                                                                                <strong>
                                                                                    {{ number_format($bills->subtotal, 0, ',', '.') }}
                                                                                    VND
                                                                                </strong>
                                                                            </span>
                                                                            <br />
                                                                            <span style="font-size:16px;">
                                                                                Thuế:
                                                                                <strong>
                                                                                    {{ number_format($bills->tax_vat, 0, ',', '.') }}
                                                                                    VND
                                                                                </strong>
                                                                            </span>
                                                                            <br />
                                                                            <span style="font-size:16px;">
                                                                                Thành tiền:
                                                                                <strong>
                                                                                    ${{ number_format($bills->total_money, 0, ',', '.') }}
                                                                                    VND
                                                                                </strong>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                    {{-- xác nhận --}}
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-12"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5c98c7; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 45px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        class="button_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td>
                                                                <div align="center">
                                                                    <a href="{{ route('web.cart_product.check_token', ['id_bill' => $bills->id_bill, 'token' => $bills->token_bill]) }}"
                                                                        style="text-decoration:none;display:inline-block;color:#000000;background-color:#ffde79;border-radius:0px;width:auto;border-top:1px solid #ffde79;border-right:1px solid #ffde79;border-bottom:1px solid #ffde79;border-left:1px solid #ffde79;padding-top:10px;padding-bottom:10px;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"
                                                                        target="_blank"><span
                                                                            style="padding-left:60px;padding-right:60px;font-size:18px;display:inline-block;letter-spacing:normal;"><span
                                                                                style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><span
                                                                                    data-mce-style="font-size: 18px; line-height: 36px;"
                                                                                    style="font-size: 18px; line-height: 36px;">
                                                                                    <strong>
                                                                                        XÁC NHẬN ĐƠN
                                                                                    </strong>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- icon --}}
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-13"
                        role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                        class="row-content stack" role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                        width="640">
                                        <tbody>
                                            <tr>
                                                <td class="column"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 25px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                    width="100%">
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                        class="social_block" role="presentation"
                                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                        width="100%">
                                                        <tr>
                                                            <td>
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="social-table"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="168px">
                                                                    <tr>
                                                                        <td style="padding:0 10px 0 0px;">
                                                                            <a href="#" target="_blank"><img
                                                                                    alt="Facebook" height="32"
                                                                                    src="{{ asset('image/mail/facebook2x.png') }}"
                                                                                    style="display: block; height: auto; border: 0;"
                                                                                    title="Facebook" width="32" /></a>
                                                                        </td>
                                                                        <td style="padding:0 10px 0 0px;">
                                                                            <a href="#" target="_blank"><img
                                                                                    alt="Twitter" height="32"
                                                                                    src="{{ asset('image/mail/twitter2x.png') }}"
                                                                                    style="display: block; height: auto; border: 0;"
                                                                                    title="Twitter" width="32" /></a>
                                                                        </td>
                                                                        <td style="padding:0 10px 0 0px;">
                                                                            <a href="#" target="_blank"><img
                                                                                    alt="Instagram" height="32"
                                                                                    src="{{ asset('image/mail/instagram2x.png') }}"
                                                                                    style="display: block; height: auto; border: 0;"
                                                                                    title="Instagram" width="32" /></a>
                                                                        </td>
                                                                        <td style="padding:0 10px 0 0px;">
                                                                            <a href="#" target="_blank"><img
                                                                                    alt="LinkedIn" height="32"
                                                                                    src="{{ asset('image/mail/linkedin2x.png') }}"
                                                                                    style="display: block; height: auto; border: 0;"
                                                                                    title="LinkedIn" width="32" /></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- End -->
</body>

</html>
