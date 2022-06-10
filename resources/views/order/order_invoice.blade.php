<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #fff; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: #573dff; font-size: 26px;"><strong>Yo Soy Tu Pádel</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
             
              Factura {{ $orders->invoice_no }}
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>
  <table width="100%" style="background: #fff; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $orders->name }}<br>
           <strong>Email:</strong> {{ $orders->email }} <br>
           <strong>Phone:</strong> {{ $orders->phone_number }} <br>
          
        </td>
        
    </tr>
  </table>
  <br/>
<h3>Reservas</h3>
  <table width="100%">
    <thead style="background-color: #3b4470; color:#FFFFFF;">
      <tr class="font">
       
        <th>Reserva</th>
        <th>Pista</th>
        <th>Día</th>
        <th>Hora</th>
        <th>Precio</th>
     
      </tr>
    </thead>
    <tbody> 
     
      
     @foreach($bookings as $key=>$booking)
      <tr class="font">
      <td align="center">{{ $key+1 }}</td>
         
         </td>
       
       
        <td align="center">{{ $booking->pista_id }}</td>
        <td align="center">{{ formatDate($booking->date, $format = 'd-m-Y ') }}</td>
        <td align="center">{{ $booking->time }}</td>
        <td align="center">{{ $booking->price }}€</td>
       
      </tr>
      @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
        <h3><span style="color: #babfe0">Descuento aplicado:</span><span style="color: #babfe0"> {{ $orders->discount }}€</span></h3>
            <h2><u style="color: #3b4470;">Total:</u><span style="color: #573dff"> {{ $orders->amount }}€</span></h2>
            {{-- <h2><span style="color: #573dff;">Pagada</h2> --}}
        </td>
    </tr>
   
  </table>
  <div class="thanks mt-3">
    <p style="color: #573dff">Gracias por reservar!!</p>
  </div>
  <div class="authority float-right mt-5">

    </div>
</body>
</html>