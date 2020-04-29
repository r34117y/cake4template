<?php

use Cake\Core\Configure;

/** @var \AdminLTE\View\AdminLTEView $this */
/** @var \App\Model\Entity\User $currentUser */
?>
<nav class="navbar navbar-static-top">

    <?php if (isset($layout) && $layout == 'top'): ?>
    <div class="container">

        <div class="navbar-header">
            <a href="<?php echo $this->Url->build('/'); ?>"
               class="navbar-brand"><?php echo Configure::read('Theme.logo.large') ?></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"><?= __('Link') ?> <span class="sr-only">(<?= __('aktywny') ?>)</span></a></li>
                <li><a href="#"><?= __('Link') ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= __('Menu rozwijane') ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><?= __('Akcja') ?></a></li>
                        <li><a href="#"><?= __('Kolejna akcja') ?></a></li>
                        <li><a href="#"><?= __('Tutaj coś innego') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><?= __('Wydzielony link') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><?= __('Jeszcze jeden wydzielony link') ?></a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="<?= __('Szukaj') ?>">
                </div>
            </form>
        </div>
        <?php else: ?>

            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only"><?= __('Nawigacja') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

        <?php endif; ?>


        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= __('Masz {0} nowych wiadomości', [4]) ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                        </div>
                                        <h4>
                                            <?= __('Obsługa klienta') ?>
                                            <small>
                                                <i class="fa fa-clock-o"></i>
                                                <?= __('{0,number,integer} minut', [5]) ?>
                                            </small>
                                        </h4>
                                        <p>Czemużby nie kupić?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <?php echo $this->Html->image('user3-128x128.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                        </div>
                                        <h4>
                                            <?= __('Frontend') ?>
                                            <small>
                                                <i class="fa fa-clock-o"></i>
                                                <?= __('{0,number,integer} godziny', [2]) ?>
                                            </small>
                                        </h4>
                                        <p>Czemużby nie kupić?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <?php echo $this->Html->image('user4-128x128.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                        </div>
                                        <h4>
                                            <?= __('Programiści') ?>
                                            <small><i class="fa fa-clock-o"></i> <?= __('Dzisiaj') ?></small>
                                        </h4>
                                        <p>Czemużby nie kupić?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <?php echo $this->Html->image('user3-128x128.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                        </div>
                                        <h4>
                                            <?= __('Sprzedaż') ?>
                                            <small><i class="fa fa-clock-o"></i> <?= __('Wczoraj') ?></small>
                                        </h4>
                                        <p>Czemużby nie kupić?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <?php echo $this->Html->image('user4-128x128.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                        </div>
                                        <h4>
                                            <?= __('Recenzenci') ?>
                                            <small>
                                                <i class="fa fa-clock-o"></i>
                                                <?= __('{0, number, integer} dni', [2]) ?>
                                            </small>
                                        </h4>
                                        <p>Czemużby nie kupić?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#"><?= __('Zobacz wszystkie wiadomości') ?></a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= __('Masz {0,number, integer} powiadomień', [10]) ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i>
                                        <?= __('{0} nowych użytkowników dołączyło dziś', [5]) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i>
                                        Tutaj jakiś bardzo długi tekst, który normalnie mógłby
                                        się nie zmieścić i popsuć wygląd strony, albo nawet coś gorszego.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i>
                                        <?= __('Dołączyło {0} nowych użytkoników', [5]) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i>
                                        <?= __('{0} nowych zamówień', [10]) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i>
                                        <?= __('Zmieniłeś swoją nazwę użytkownika') ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#"><?= __('Pokaż wszystko') ?></a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= __('Masz {0} zadań', [9]) ?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Zaprojektować jakieś guziki
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">
                                                    <?= __('Gotowe w {0,number,percent}', [20]) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Zrobić jakąś skórkę
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">
                                                    <?= __('Gotowe w {0,number,percent}', [40]) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Cośtam jeszcze do zrobienia
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">
                                                    <?= __('Gotowe w {0,number,percent}', [60]) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Byle nie Weba :/
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">
                                                    <?= __('Gotowe w {0,number,percent}', [80]) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#"><?= __('Pokaż wszystkie zadania') ?></a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'user-image', 'alt' => 'User Image')); ?>
                        <span class="hidden-xs"><?= $currentUser->getDisplayName() ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>

                            <p>
                                <?= $currentUser->getDisplayName() ?> - <?= $currentUser->roles[0]->name ?>
                                <small><?= __('Członek od {0,date}', [new \Cake\I18n\FrozenDate()]) ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?= __('Obserwujący') ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?= __('Sprzedaż') ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?= __('Znajomi') ?></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"><?= __('Profil') ?></a>
                            </div>
                            <div class="pull-right">
                                <?= $this->Html->link(
                                    __('Wyloguj'),
                                    ['controller' => 'Auth', 'action' => 'logout'],
                                    ['class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <?php if (!isset($layout)): ?>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if (isset($layout) && $layout == 'top'): ?>
    </div>
<?php endif; ?>
</nav>
