<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= __('Błąd 404') ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Strona główna') ?></a></li>
        <li><a href="#"><?= __('Przykłady') ?></a></li>
        <li class="active"><?= __('Błąd 404') ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! <?= __('Nie znaleziono strony') ?>.</h3>

            <p>
                <?= __('Nie odnaleziono żadnej strony pod podanym adresem') ?>.
                Możesz <a href="<?php echo $this->Url->build('pages/home'); ?>">wrócić do strony głównej</a> lub użyć
                poniższego formularza.
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="<?= __('Szukaj') ?>">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i
                                class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
