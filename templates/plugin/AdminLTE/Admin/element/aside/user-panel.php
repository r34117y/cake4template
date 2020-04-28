<?php
/** @var \AdminLTE\View\AdminLTEView $this */
/** @var \App\Model\Entity\User $currentUser */
?>
<div class="user-panel">
    <div class="pull-left image">
        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
    </div>
    <div class="pull-left info">
        <p><?= $currentUser->getDisplayName() ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?= __('Online') ?></a>
    </div>
</div>
