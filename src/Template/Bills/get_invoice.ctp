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
        Bill
        <small>#<?=$payerReference = $customerDetails['reference']; ?></small>
    </h1>
    <ol class="breadcrumb">
      <!--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
        <!--<li><a href="#">Examples</a></li>-->
        <!--<li class="active">Invoice</li>-->
    </ol>
</section>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class=""><?php echo $this->Html->image('necta-logo.png') ?></i> The National Examinations Council of Tanzania.
                <small class="pull-right">Generated on:  <?=$generatedDate = $customerDetails['generated_date'] ?></small>
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
            <b>Bill #:<?=$payerReference = $customerDetails['reference']; ?></b><br>
            <b>Control Number #: <?="On processing"; ?></b><br>
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
                        <th>Service</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Unit Cost</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($billDetails as $billData){ ?>
                    <tr>
                        <td><?php echo $billData['collection']['name']; ?></td>
                        <td><?php echo $billData['quantity']; ?></td>
                        <td><?php echo $billData['unit']; ?> </td>
                        <td><?php echo number_format($billData['collection']['amount'], 2); ?></td>
                        <td><?php echo number_format($billData['amount'], 2) ; ?></td>
                    </tr>


<?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total:</th>
                        <td><?php echo number_format($totalAmount, 2);  ?></td>
                    </tr>

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
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                You can pay in one out of these payment options: Bank, Mobile (Tigo, Vodacom, Airtel, TTCL or Zantel) 
                or MaxMalipo.
            </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <!--<p class="lead">Amount Due 2/22/2014</p>-->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>
        </div>
    </div>
</section>

