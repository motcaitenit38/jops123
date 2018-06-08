<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!--[if gte mso 9]><xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <!-- fix outlook zooming on 120 DPI windows devices -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
    <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
    <title>Single Column</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
</head>
<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
    <tr>
        <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">
                Hồ sơ của bạn đã được chấp nhận
            <br>

            <!-- 600px container (white background) -->
            <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
                <tr>
                    <td class="container-padding header" align="left">
                        Chúc mừng bạn!
                    </td>
                </tr>
                <tr>
                    <td class="container-padding content" align="left">
                        <br>

                        <div class="title">Chào bạn!</div>
                        <br>

                        <div class="body-text">
                            Công ty <strong>{{ $tuyendung_name }} </strong> đã chọn hồ sơ <strong>{{ $cv_name }}</strong> của bạn để làm đối tác cho dự án <strong>{{ $job_name }}</strong>
                            <br><br>


                        </div>

                    </td>
                </tr>
                <tr>
                    <td class="container-padding footer-text" align="left">
                        <br><br>
                        Copyright Job Stock © 2018. All Rights Reserved
                        <br><br>

                        {{--You are receiving this email because you opted in on our website. Update your <a href="#">email preferences</a> or <a href="#">unsubscribe</a>.--}}
                        {{--<br><br>--}}

                        {{--<strong>Acme, Inc.</strong><br>--}}
                        {{--<span class="ios-footer">--}}
                        {{--123 Main St.<br>--}}
                        {{--Springfield, MA 12345<br>--}}
                        {{--</span>--}}
                        {{--<a href="http://www.acme-inc.com">www.acme-inc.com</a><br>--}}

                        {{--<br><br>--}}

                    </td>
                </tr>
            </table><!--/600px container -->


        </td>
    </tr>
</table><!--/100% background wrapper-->

</body>
</html>