<head>
    <style type="text/css">

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            table.details tr th {
                background-color: #F2F2F2 !important;
            }

            .print_bg {
                background-color: #F2F2F2 !important;
            }

        }

        .print_bg {
            background-color: #F2F2F2 !important;
        }

        body {
            font-family: "Open Sans", helvetica, sans-serif;
            font-size: 13px;
            color: #000000;
        }

        table.logo {
            -webkit-print-color-adjust: exact;
            border-collapse: inherit;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 2px solid #25221F;

        }

        table.emp {
            width: 100%;
            margin-bottom: 10px;
            padding: 40px;
        }

        table.details, table.payment_details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table.payment_total {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 10px;
        }

        table.emp tr td {
            width: 30%;
            padding: 10px
        }

        table.details tr th {
            border: 1px solid #000000;
            background-color: #F2F2F2;
            font-size: 15px;
            padding: 10px
        }

        table.details tr td {
            vertical-align: top;
            width: 30%;
            padding: 3px
        }

        table.payment_details > tbody > tr > td {
            border: 1px solid #000000;
            padding: 5px;
        }

        table.payment_total > tbody > tr > td {
            padding: 5px;
            width: 60%
        }

        table.logo > tbody > tr > td {
            border: 1px solid transparent;
        }
    </style>
</head>

<body>
    <table class="details">
        <tr>
            <td>
                <table class="payment_details">
                    <tr>
                    <th style="text-align: center;" colspan="2">{{ $pageTitle }}</th>
                </tr>
                <tr>
                    <td><strong>@lang("core.payType")</strong></td>

                    <td><strong>@lang("core.amount")</strong></td>
                </tr>

                <tr>
                    <td>@lang("core.fileno")</td>
                    <td> {{$nudata->fileno}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filename")</td>
                    <td> {{$nudata->filename}}</td>
                </tr>
                <tr>
                    <td>@lang("core.subject")</td>
                    <td> {{$nudata->subject}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filecomedate")</td>
                    <td> {{$nudata->filecomedate}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filecomefrom")</td>
                    <td> {{$nudata->filecomefrom}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filemark")</td>
                    <td> {{$nudata->filemark}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filego")</td>
                    <td> {{$nudata->filego}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filegodate")</td>
                    <td> {{$nudata->filegodate}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filelawgodate")</td>
                    <td> {{$nudata->filelawgodate}}</td>
                </tr>
                <tr>
                    <td>@lang("core.filelawcomedate")</td>
                    <td> {{$nudata->filelawcomedate}}</td>
                </tr>
                <tr>
                    <td>@lang("core.comments")</td>
                    <td> {{$nudata->comments}}</td>
                </tr>
                </table>
            </td>
        </tr>
    </table>
</body>




