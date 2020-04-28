<?php
/** @var \AdminLTE\View\AdminLTEView $this */
?>
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading"><?= __('Ostatnia aktywność') ?></h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Urodziny Langdona</h4>

                            <p>Odbędą sią 24. kwietnia o 23:00</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo zaktualizował profil</h4>

                            <p>Nowy nr telefonu +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora dołączyła do listy mailingowej</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Wykonano zadanie Crona nr 254</h4>

                            <p>Czas wykonywania: 5 sekund</p>
                        </div>
                    </a>
                </li>
            </ul>

            <h3 class="control-sidebar-heading"><?= __('Postęp wykonywania zadań') ?></h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            <?= __('Projekt szablonów') ?>
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            <?= __('Aktualizacja raportu') ?>
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            <?= __('Integracja z X-One') ?>
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            <?= __('Backend') ?>
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab"><?= __('Statystyki') ?></div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading"><?= __('Ustawienia ogólne') ?></h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <?= __('Panel raportowania') ?>
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Jakieś informacje na temat tej opcji
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <?= __('Przekierowanie poczty') ?>
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Coś o tym przekierowaniu
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Wyświetlaj dane autora w poście
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Wyświetl imię i nazwisko
                    </p>
                </div>

                <h3 class="control-sidebar-heading"><?= __('Ustawienia chata') ?></h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <?= __('Pokaż, że jestem online') ?>
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <?= __('Wyłącz powiadomienia') ?>
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        <?= __('Usuń historię czata') ?>
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</aside>
