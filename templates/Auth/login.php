<?php
/** @var \App\View\AppView $this */
?>
<div class="text-center">
    <?= $this->Form->create(NULL, ['class' => 'form-signin']) ?>
    <?= $this->Form->control('email', [
        'label' => 'Email',
        'div' => FALSE,
        'autofocus' => 'autofocus']); ?>
    <?= $this->Form->control('password', [
        'type' => 'password',
        'label' => __('Hasło'),
        'div' => FALSE]); ?>
    <div>
        <?= $this->Form->button(__('Zaloguj się'), ['class' => 'btn log-in-btn mt-4']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
