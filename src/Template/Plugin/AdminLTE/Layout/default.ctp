<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap.min'); ?>
    <!-- Font Awesome -->
    <?= $this->Html->css('font-awesome.min') ?>
    <!-- Ionicons -->
    <?= $this->Html->css('ionicons.min') ?>
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-' . Configure::read('Theme.skin') . '.min'); ?>
    <?php echo $this->Html->css(['AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min',],['block' => 'css']);?>
    <?php echo $this->Html->css('chosen') ?>
    <?php echo $this->Html->css('custom'); ?>

    <?php echo $this->fetch('css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?= $this->Html->script('html5shiv.min') ?>
    <?= $this->Html->script('respond.min') ?>
    <![endif]-->
</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><?php echo Configure::read('Theme.logo.mini'); ?></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><?php echo Configure::read('Theme.logo.large'); ?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php echo $this->element('nav-top') ?>
    </header>

    <!-- Left side column. contains the sidebar -->
    <?php echo $this->element('aside-main-sidebar'); ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $this->Flash->render(); ?>
        <?php echo $this->Flash->render('auth'); ?>
        <?php echo $this->fetch('content'); ?>

    </div>
    <!-- /.content-wrapper -->

    <?php echo $this->element('footer'); ?>

    <!-- Control Sidebar -->
    <?php echo $this->element('aside-control-sidebar'); ?>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jquery-2.2.3.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap.min'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>
<?php echo $this->Html->script(['AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',], ['block' => 'script']);?>


<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE./js/app.min'); ?>
<?php echo $this->Html->script('chosen.jquery') ?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBottom'); ?>
<?php echo $this->Html->script('bills'); ?>
<?php //echo $this->Html->script('eservices');?>

<script type="text/javascript">
    $(document).ready(function () {
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        // $(".region, .district, .centre").chosen({
        //     width: "200"
        // });

        $('.region').chosen({
            width: '150'
        }).change(function () {
            $('.centre').find('option').not(':first').remove();
            $('.centre').trigger("chosen:updated");
            $('.exam-type').find('option').not(':first').remove();
            $('.exam-type').trigger("chosen:updated");
            loadDistricts($(this).val(), $('.district'));
        });

        $('.district').chosen({
            width: '150',
            allow_single_deselect: true
        }).change(function () {
            $(".exam-type").find('option').not(':first').remove();
            $('.exam-type').trigger("chosen:updated");
            loadCentres($(this).val(), $('.centre'));
        });

        $('.centre').chosen({
            width: '250',
            allow_single_deselect: true
        }).change(function () {
            loadExamTypes($(this).val(), $('.exam-type'));
        });

        $('.exam-type').chosen({
            width: '150'
        });

        $('.region-permissions').chosen({
            width: '100%'
        }).change(function () {
            $('.centre-permissions').find('option').not(':first').remove();
            $('.centre-permissions').trigger("chosen:updated");
            loadDistricts($(this).val(), $('.district-permissions'));
        });

        $('.district-permissions').chosen({
            width: '100%'
        }).change(function () {
            $('.centre-permissions').find('option').not(':first').remove();
            $('.centre-permissions').trigger("chosen:updated");
            loadCentres($(this).val(), $('.centre-permissions'));
        });

        $('.group-permissions, .centre-permissions').chosen({
            width: '100%'
        });

        $('.reload').on('click', function () {
            reloadPage();
        });

        $('.multi').chosen({
            width: '100%'
        });

        var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }

        $('.textarea').wysihtml5()
    });

    function loadDistricts(regionId, to) {
        $.ajax({
            url: '<?= $this->Url->build('/', true) ?>districts/list-districts/' + regionId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const district = to; //Clear select options
                district.find('option').not(':first').remove();
                $.each(data, function (key, value) {
                    district.append($('<option>').attr('value', key).text(value));
                });

                district.trigger("chosen:updated");
            }
        });
    }

    function loadCentres(districtId, to) {
        $.ajax({
            url: '<?= $this->Url->build('/', true) ?>centres/list-centres/' + districtId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const centre = to; //Clear select options
                centre.find('option').not(':first').remove();
                $.each(data, function (key, value) {
                    centre.append($('<option>').attr('value', key).text(value));
                });

                centre.trigger("chosen:updated");
            }
        });
    }

    function loadExamTypes(centreId, to) {
        $.ajax({
            url: '<?= $this->Url->build('/', true) ?>centres/list-exam-types/' + centreId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const examType = to; //Clear select options
                examType.find('option').not(':first').remove();
                $.each(data, function (key, value) {
                    examType.append($('<option>').attr('value', key).text(value));
                });

                examType.trigger("chosen:updated");
            }
        });
    }

    function reloadPage() {
        $.ajax({
            url: '<?= $this->Url->build('/', true) ?>users/reload/?regionId=' + $('.region').val()
            + '&districtId=' + $('.district').val() + '&centreId=' + $('.centre').val()
            + '&examTypeId=' + $('.exam-type').val(),
            // data: {
            //     regionId: $('.region').val(),
            //     districtId: $('.district').val(),
            //     centreId: $('.centre').val()
            // },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.response) {
                    location.reload(true);
                }
            }
        });
    }
 </script>
</body>
</html>
