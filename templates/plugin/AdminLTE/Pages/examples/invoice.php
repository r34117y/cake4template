<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= __('Faktura') ?>
        <small>#007612</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Strona główna') ?></a></li>
        <li><a href="#"><?= __('Przykłady') ?></a></li>
        <li class="active"><?= __('Faktura') ?></li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> <?= __('Info') ?>:</h4>
        Ta strona jest przystosowana do wydruku.
        Kliknij ikonę drukarki pod fakturą.
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> X-One Sp. z o.o.
                <small class="pull-right"><?= __('Data') ?>: 2/10/2014</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <?= __('Wystawiający') ?>
            <address>
                <strong>X-One Sp. z o.o.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <?= __('Telefon') ?>: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <?= __('Odbiorca') ?>
            <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <?= __('Telefon') ?>: (555) 539-1037<br>
                Email: john.doe@example.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b><?= __('Faktura') ?> #007612</b><br>
            <br>
            <b><?= __('ID zamówienia') ?>:</b> 4F3S8J<br>
            <b><?= __('Płatność do') ?>:</b> 2/22/2014<br>
            <b><?= __('Nr konta') ?>:</b> 968-34567
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
                    <th><?= __('Ilość') ?></th>
                    <th>Produkt</th>
                    <th><?= __('Identyfikator') ?> #</th>
                    <th><?= __('Opis') ?></th>
                    <th><?= __('Łącznie') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Call of Duty</td>
                    <td>455-981-221</td>
                    <td><?= __('gra komputerowa') ?></td>
                    <td>$64.50</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Need for Speed IV</td>
                    <td>247-925-726</td>
                    <td><?= __('gra komputerowa') ?></td>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Monsters DVD</td>
                    <td>735-845-642</td>
                    <td><?= __('film') ?></td>
                    <td>$10.70</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Grown Ups Blue Ray</td>
                    <td>422-568-642</td>
                    <td><?= __('film') ?></td>
                    <td>$25.99</td>
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
            <p class="lead"><?= __('Metody płatności') ?>:</p>
            <?php echo $this->Html->image('credit/visa.png', array('alt' => 'Visa')); ?>
            <?php echo $this->Html->image('credit/mastercard.png', array('alt' => 'Mastercard')); ?>
            <?php echo $this->Html->image('credit/american-express.png', array('alt' => 'American Express')); ?>
            <?php echo $this->Html->image('credit/paypal2.png', array('alt' => 'Paypal')); ?>

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
                    <tr>
                        <th style="width:50%"><?= __('Netto') ?>:</th>
                        <td>$250.30</td>
                    </tr>
                    <tr>
                        <th><?= __('Podatek') ?> (9.3%)</th>
                        <td>$10.34</td>
                    </tr>
                    <tr>
                        <th><?= __('Dostawa') ?>:</th>
                        <td>$5.80</td>
                    </tr>
                    <tr>
                        <th><?= __('Łącznie') ?>:</th>
                        <td>$265.24</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'display', 'examples', 'invoice-print']); ?>"
               target="_blank" class="btn btn-default"><i class="fa fa-print"></i> <?= __('Drukuj') ?></a>
            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                <?= __('Zapłać') ?>
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> <?= __('Generuj PDF') ?>
            </button>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
