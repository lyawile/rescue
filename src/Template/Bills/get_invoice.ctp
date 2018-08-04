<?php
foreach ($queryDetails as $customerDetails) {

//    echo $payer_name = $customerDetails['payer_name'] . "<br/>";
//    echo $payerReference = $customerDetails['reference'] . "<br/>";
//    echo $totalAmount = $customerDetails['amount'] . "<br/>";
//    echo $generatedDate = $customerDetails['generated_date'] . "<br/>";
//    echo $expireDate = $customerDetails['expire_date'] . "<br/>";
//    echo $mobile = $customerDetails['payer_mobile'] . "<br/>";
//    echo $controlNumber = $customerDetails['control_number'] . "<br/>";
}
?>

<section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> The National Examinations Council of Tanzania.
            <small class="pull-right">Date: <?=$generatedDate = $customerDetails['generated_date'] ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>NECTA</strong><br>
            Kijitonyama, Kinondoni<br>
            Dar es Salaam<br>
            Phone: +255-22-2700493 - 6/9<br>
            Email: es@necta.go.tz
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?=$payer_name = $customerDetails['payer_name']?></strong><br>
            <!--795 Folsom Ave, Suite 600<br>-->
            <!--San Francisco, CA 94107<br>-->
            Phone: <?=$mobile = $customerDetails['payer_mobile'] ?><br>
            Email: <?=$email = $customerDetails['payer_email'] ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?=$payerReference = $customerDetails['reference']; ?></b><br>
          <br>
          <!--<b>Order ID:</b> 4F3S8J<br>-->
          <b>Payment Due:</b> <?=$expireDate = $customerDetails['expire_date']; ?><br>
          <!--<b>Account:</b> 968-34567-->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Service</th>
              <th>Unit</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($billDetails as $billData){ ?>
                <tr>
              <td><?php echo $billData['quantity']; ?></td>
              <td><?php echo $billData['collection']['name']; ?></td>
              <td><?php echo $billData['unit']; ?> </td>
              <td></td>
              <td><?php echo $billData['amount']; ?></td>
            </tr>
    
<?php } ?>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th>Total:</th>
                <td><?php echo $totalAmount;  ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>

