<style>
    /* reset */

    * {

        font-family: 'XBRiyaz', sans-serif;
        border: 0;
        box-sizing: content-box;
        color: inherit;
        font-size: inherit;
        font-style: inherit;
        font-weight: inherit;
        line-height: inherit;
        list-style: none;
        margin: 0;
        padding: 0;
        text-decoration: none;
        vertical-align: top;
    }

    /* content editable */

    *[contenteditable] {
        border-radius: 0.25em;
        min-width: 1em;
        outline: 0;
    }

    *[contenteditable] {
        cursor: pointer;
    }

    *[contenteditable]:hover,
    *[contenteditable]:focus,
    td:hover *[contenteditable],
    td:focus *[contenteditable],
    img.hover {
        background: #DEF;
        box-shadow: 0 0 1em 0.5em #DEF;
    }

    span[contenteditable] {
        display: inline-block;
    }

    /* heading */

    h1 {
        font: bold 100% sans-serif;
        letter-spacing: 0.5em;
        text-align: center;
        text-transform: uppercase;
    }

    /* table */

    table {

        font-size: 75%;
        table-layout: fixed;
        width: 100%;
    }

    table {
        border-collapse: separate;
        border-spacing: 2px;
    }

    th,
    td {
        border-width: 1px;
        padding: 0.5em;
        position: relative;
        text-align: left;
    }

    th,
    td {
        border-radius: 0.25em;
        border-style: solid;
    }

    th {
        background: #EEE;
        border-color: #BBB;
    }

    td {
        border-color: #DDD;
    }

    /* page */

    html {
        font: 16px/1 'Open Sans', sans-serif;
        overflow: auto;
        padding: 0.5in;
    }

    html {
        background: #999;
        cursor: default;
    }

    body {
        box-sizing: border-box;
        height: 11in;
        margin: 0 auto;
        overflow: hidden;
        padding: 0.5in;
        width: 8.5in;
    }

    body {
        background: #FFF;
        border-radius: 1px;
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
    }

    /* header */

    header {
        margin: 0 0 3em;
    }

    header:after {
        clear: both;
        content: "";
        display: table;
    }

    header h1 {
        background: #000;
        border-radius: 0.25em;
        color: #FFF;
        margin: 0 0 1em;
        padding: 0.5em 0;
    }

    header address {
        float: left;
        font-size: 75%;
        font-style: normal;
        line-height: 1.25;
        margin: 0 1em 1em 0;
    }

    header address p {
        margin: 0 0 0.25em;
    }

    header span,
    header img {
        display: block;
        float: right;
    }

    header span {
        margin: 0 0 1em 1em;
        max-height: 25%;
        max-width: 60%;
        position: relative;
    }

    header img {
        max-height: 100%;
        max-width: 100%;
    }

    header input {
        cursor: pointer;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        height: 100%;
        left: 0;
        opacity: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }

    /* article */

    article,
    article address,
    table.meta,
    table.inventory {
        margin: 0 0 3em;
    }

    article:after {
        clear: both;
        content: "";
        display: table;
    }

    article h1 {
        clip: rect(0 0 0 0);
        position: absolute;
    }

    article address {
        float: left;
        font-size: 125%;
        font-weight: bold;
    }

    /* table meta & balance */

    table.meta,
    table.balance {
        float: right;
        width: 36%;
    }

    table.meta:after,
    table.balance:after {
        clear: both;
        content: "";
        display: table;
    }

    /* table meta */

    table.meta th {
        width: 40%;
    }

    table.meta td {
        width: 60%;
    }

    /* table items */

    table.inventory {
        clear: both;
        width: 100%;
    }

    table.inventory th {
        font-weight: bold;
        text-align: center;
    }

    table.inventory td:nth-child(1) {
        width: 26%;
    }

    table.inventory td:nth-child(2) {
        width: 38%;
    }

    table.inventory td:nth-child(3) {
        text-align: right;
        width: 12%;
    }

    table.inventory td:nth-child(4) {
        text-align: right;
        width: 12%;
    }

    table.inventory td:nth-child(5) {
        text-align: right;
        width: 12%;
    }

    /* table balance */

    table.balance th,
    table.balance td {
        width: 50%;
    }

    table.balance td {
        text-align: right;
    }

    /* aside */

    aside h1 {
        border: none;
        border-width: 0 0 1px;
        margin: 0 0 1em;
    }

    aside h1 {
        border-color: #999;
        border-bottom-style: solid;
    }

    /* javascript */

    .add,
    .cut {
        border-width: 1px;
        display: block;
        font-size: .8rem;
        padding: 0.25em 0.5em;
        float: left;
        text-align: center;
        width: 0.6em;
    }

    .add,
    .cut {
        background: #9AF;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
        background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
        border-radius: 0.5em;
        border-color: #0076A3;
        color: #FFF;
        cursor: pointer;
        font-weight: bold;
        text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
    }

    .add {
        margin: -2.5em 0 0;
    }

    .add:hover {
        background: #00ADEE;
    }
    .rtl {
        direction: rtl;
    }

    .cut {
        opacity: 0;
        position: absolute;
        top: 0;
        left: -1.5em;
    }

    .cut {
        -webkit-transition: opacity 100ms ease-in;
    }

    tr:hover .cut {
        opacity: 1;
    }

    @media print {
        * {
            -webkit-print-color-adjust: exact;
        }

        html {
            background: none;
            padding: 0;
        }

        body {
            box-shadow: none;
            margin: 0;
        }

        span:empty {
            display: none;
        }

        .add,
        .cut {
            display: none;
        }
    }


    @page {
        margin: 0;
    }

</style>

<div class="rtl">
    <div class="logo-container">
        <img style="height: 100px" src="logo.jpg">
    </div>
 <div  style="direction: rtl;">
    <table>
        <tr>
            <td rowspan="2" class="client-name" >
               <div style="direction: rtl;"> ثمال لصيانة السيارات </div>
            </td>
            <td>
                <p> تاريخ الإصدار : {{ $Date }}</p>

            </td>
        </tr>
        <tr>
            <td>
                <p><strong>رقم الفاتورة:</strong> {{ $invoicNum }}</p>
            </td>
        </tr>
        <tr>
            <td>
                ينبع - حي الياقوت -
                طريق الملك عبدالعزيز
            </td>
            <td>
                <p><strong>نوع الفاتورة:</strong> مبسطة</p>

            </td>
        </tr>
        <tr>
        <tr>
            <td>
                <p><strong>رقم الهاتف:</strong> 9661422055</p>
            </td>
            <td>
                <p><strong>الاسم:</strong> {{ $car->name }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>السجل التجاري:</strong> 4700115456</p>
            </td>
            <td>
                <p><strong>نوع العميل:</strong> نقدى</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>الرقم الضريبي:</strong> 311150116600003</p>
            </td>>
            <td>
                <p><strong>رقم اللوحة:</strong> {{ $car->plate }}</p>
                <p><strong>رقم التلفون:</strong> {{ $car->phone }}</p>

            </td>
        </tr>




        </tr>
    </table>


    <table border="1">
        <thead>
            <tr>
                <th>رقم</th>
                <th>اسم الصنف</th>
                <th>رمز الصنف</th>
                <th>الوحدة</th>
                <th>الكمية</th>
                <th>السعر</th>
            </tr>
        </thead>
        @if (isset($items))


            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }}</td>

                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>

    <table>
        <tr>
            <td>المبلغ المقدم : {{ $items->sum(function ($item) {return $item->price * $item->quantity;}) }}</td>
        </tr>
        <tr>
            <td>إجمالى الضريبة : {{ $items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15 }}
            </td>
        </tr>

        <tr>


            <td>
                <p>المجموع الكلي:
                    {{ $items->sum(function ($item) {return $item->price * $item->quantity;}) +$items->sum(function ($item) {return $item->price * $item->quantity;}) *0.15 }}
                </p>
                <p>مبلغ الخصم: نقدى</p>
                <p>مبلغ قيمة الضريبة المضافة:</p>
                <p>صافي المبلغ:</p>


            </td>
        </tr>

    </table>

    <div class="footer">
        <div class="footer-info">
            <span>ملاحظات : </span>
        </div>
    </div>

</div>
