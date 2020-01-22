<html>
<head>
    <style>
        html, body{

            background-color: #eeeeee;
            color: #333;
            font-family: sans-serif;
            font-weight: 100;
            margin: 0;

        }
        .mail_btn{
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .outlined{
            border: #AA3D92 solid 1px;
            background: transparent;
            color:  #AA3D92 ;
        }
    </style>
</head>
<body>

<table cellspacing='0' style=' width: 100%; height: 200px;'>

    <tr style='background-color: #511650;'>
        <th colspan='2' style='padding: 0 20px;'><span style='font-size: 20px; color: #dedede'>SMILE PLANET ENTREPRENEUR HUB/FOUNDATION </span></th>
    </tr>
    <tr>
        <td colspan='2'>
            <h3 style='text-align: center;padding: 0 50px; margin-bottom:  50px;'>{{ $title }}</h3>
            <p style='text-align: center;padding: 0 50px; margin-bottom:  50px;'>{!! $content !!}</p>
            <hr>
        </td>
    </tr>

</table>
</body>
</html>