<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
body,
table,
td,
a {
-webkit-text-size-adjust: 100%;
-ms-text-size-adjust: 100%;
}
table,
td {
mso-table-lspace: 0pt;
mso-table-rspace: 0pt;
}
img {
-ms-interpolation-mode: bicubic;
}
img {
border: 0;
height: auto;
line-height: 100%;
outline: none;
text-decoration: none;
}
table {
border-collapse: collapse !important;
}
body {
height: 100% !important;
margin: 0 !important;
padding: 0 !important;
width: 100% !important;
}
a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
@media screen and (max-width: 480px) {
.mobile-hide {
display: none !important;
}
.mobile-center {
text-align: center !important;
}
}
div[style*="margin: 16px 0;"] {
margin: 0 !important;
}
</style>
<body style="margin: 0 !important; padding: 0 !important; >
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

</div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;margin-bottom:0;" class="mobile-center">
</a><img src="{{asset('images')}}/logo2.png" style="width:400px" class="table-user-thumb" ><a>
</td>
</tr>
</table>
</div>
<div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
<tr>
<td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
<table cellspacing="0" cellpadding="0" border="0" align="right">

</table>
</td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
<tr>
<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 0;top:-15px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="100" height="100" style="display: block; border: 0px;" /><br>
<h2 style="font-size:22px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Gracias por reservar en Yo Soy Tu Pádel! </h2>
</td>
</tr>
<tr>
<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
<p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">Hola {{ $order['name'] }}!  Aquí tienes los datos de tu reserva</p>
</td>
</tr>
<tr>
<td align="left" style="padding-top: 20px;">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Factura Número </td>
<td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> {{ $order['invoice_no'] }} </td>
</tr>
<tr>
<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Nombre </td>
<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> {{ $order['name'] }} </td>
</tr>
<tr>
<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Email Usuario </td>
<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> {{ $order['email'] }} </td>

                        
                @for($i=0;$i < sizeof($order['pista_id']);$i++)        
</tr style="border:1px solid black !important;">
                      
                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Pista</td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> {{ $order['pista_id'][$i] }}</td>
                        </tr>
                        <tr>
                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Día</td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> {{ $order['date'][$i] }}</td>
                        </tr>
                        <tr>
                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Hora</td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> {{ $order['time'][$i] }}</td>
                        </tr>
 @endfor
</table>
 </td>
</tr>
<tr>
<td align="left" style="padding-top: 20px;">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> {{ $order['amount'] }}€ </td>
</tr>
</table>

</body>
</html> 

