<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= __('Błąd serwera') ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Strona główna') ?></a></li>
        <li><a href="#"><?= __('Przykłady') ?></a></li>
        <li class="active"><?= __('Błąd serwera') ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="error-page">
        <h2 class="headline text-red">500</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i> Oops! <?= __('Coś poszło nie tak') ?>.</h3>

            <p>
                Pracujemy nad rozwiązaniem problemu.
                Możesz <a href="<?php echo $this->Url->build('pages/home'); ?>">wrócić do strony głównej</a> lub użyć
                poniższego formularza.
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="<?= __('Szukaj') ?>">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
    </div>
    <!-- /.error-page -->

</section>
<!-- /.content -->
