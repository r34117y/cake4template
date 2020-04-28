<?php
/** @var \App\View\AppView $this */
?>
<div>
    <?= $this->Form->create(NULL, ['class' => 'form-signin']) ?>
    <h2 class="headings text-center"><?= __('Panel administracyjny') ?></h2>
    <?= $this->Form->control('email', [
        'label' => 'Email',
        'div' => FALSE,
        'autofocus' => 'autofocus']); ?>
    <?= $this->Form->control('password', [
        'type' => 'password',
        'label' => __('Hasło'),
        'div' => FALSE]); ?>
    <div>
        <div class="forgot-password">
            <a href="#"><?= __('Zapomniałeś hasła?') ?></a>
        </div>

        <?= $this->Form->button(__('Zaloguj się'), ['class' => 'btn log-in-btn mt-4']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

