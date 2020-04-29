<footer class="main-footer">
    <?php if (isset($layout) && $layout == 'top'): ?>
    <div class="container">
        <?php endif; ?>
        <div class="pull-right hidden-xs">
            <b><?= __('Wersja') ?></b> 2.4.5
        </div>
        <strong>Copyright &copy; 2020 <a href="https://adminlte.io">X-One</a>.</strong>
        <?= __('Wszystkie prawa zastrzeżone') ?>
        <?php if (isset($layout) && $layout == 'top'): ?>
    </div>
<?php endif; ?>
</footer>
