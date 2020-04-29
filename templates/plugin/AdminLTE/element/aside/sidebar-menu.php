<ul class="sidebar-menu" data-widget="tree">
  <li class="header"><?= __('GŁÓWNA NAWIGACJA') ?></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span><?= __('Dashboard') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-circle-o"></i> <?= __('Dashboard v1') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/home2'); ?>"><i class="fa fa-circle-o"></i> <?= __('Dashboard v2') ?></a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-files-o"></i>
      <span><?= __('Layouty') ?></span>
      <span class="pull-right-container">
        <span class="label label-primary pull-right">4</span>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/layout/top-nav'); ?>"><i class="fa fa-circle-o"></i> <?= __('Nawigacja u góry') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/layout/boxed'); ?>"><i class="fa fa-circle-o"></i> <?= __('Pudełka') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/layout/fixed'); ?>"><i class="fa fa-circle-o"></i> <?= __('Fixed') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/layout/collapsed-sidebar'); ?>"><i class="fa fa-circle-o"></i> <?= __('Zwinięte menu boczne') ?></a></li>
    </ul>
  </li>
  <li>
    <a href="<?php echo $this->Url->build('/pages/widgets'); ?>">
      <i class="fa fa-th"></i> <span><?= __('Widgety') ?></span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"><?= __('nowy') ?></small>
      </span>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-pie-chart"></i>
      <span><?= __('Wykresy') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/charts/chartjs'); ?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
      <li><a href="<?php echo $this->Url->build('/pages/charts/morris'); ?>"><i class="fa fa-circle-o"></i> Morris</a></li>
      <li><a href="<?php echo $this->Url->build('/pages/charts/flot'); ?>"><i class="fa fa-circle-o"></i> Flot</a></li>
      <li><a href="<?php echo $this->Url->build('/pages/charts/inline'); ?>"><i class="fa fa-circle-o"></i> Inline charts</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span><?= __('Elementy UI') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/ui/general'); ?>"><i class="fa fa-circle-o"></i> <?= __('Ogólne') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/ui/icons'); ?>"><i class="fa fa-circle-o"></i> <?= __('Ikony') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/ui/buttons'); ?>"><i class="fa fa-circle-o"></i> <?= __('Przyciski') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/ui/sliders'); ?>"><i class="fa fa-circle-o"></i> <?= __('Suwaki') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/ui/timeline'); ?>"><i class="fa fa-circle-o"></i> <?= __('Linia czasu') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/ui/modals'); ?>"><i class="fa fa-circle-o"></i> <?= __('Modale') ?></a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span><?= __('Formularze') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/forms/general'); ?>"><i class="fa fa-circle-o"></i> <?= __('Elementy podstawowe') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/forms/advanced'); ?>"><i class="fa fa-circle-o"></i> <?= __('Elementy zaawansowane') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/forms/editors'); ?>"><i class="fa fa-circle-o"></i> <?= __('Edytory') ?></a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span><?= __('Tabele') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/tables/simple'); ?>"><i class="fa fa-circle-o"></i> <?= __('Zwykłe tabele') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/tables/data'); ?>"><i class="fa fa-circle-o"></i> <?= __('Data tables') ?></a></li>
    </ul>
  </li>
  <li>
    <a href="<?php echo $this->Url->build('/pages/calendar'); ?>">
      <i class="fa fa-calendar"></i> <span><?= __('Kalendarz') ?></span>
      <span class="pull-right-container">
        <small class="label pull-right bg-red">3</small>
        <small class="label pull-right bg-blue">17</small>
      </span>
    </a>
  </li>
  <li>
    <a href="<?php echo $this->Url->build('/pages/mailbox/mailbox'); ?>">
      <i class="fa fa-envelope"></i> <span><?= __('Mailbox') ?></span>
      <span class="pull-right-container">
        <small class="label pull-right bg-yellow">12</small>
        <small class="label pull-right bg-green">16</small>
        <small class="label pull-right bg-red">5</small>
      </span>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-folder"></i> <span><?= __('Przykłady') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build('/pages/examples/invoice'); ?>"><i class="fa fa-circle-o"></i> <?= __('Faktura') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/profile'); ?>"><i class="fa fa-circle-o"></i> <?= __('Profil') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/login'); ?>"><i class="fa fa-circle-o"></i> <?= __('Login') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/register'); ?>"><i class="fa fa-circle-o"></i> <?= __('Rejestracja') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/lockscreen'); ?>"><i class="fa fa-circle-o"></i> <?= __('Lockscreen') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/404'); ?>"><i class="fa fa-circle-o"></i> <?= __('Błąd 404') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/500'); ?>"><i class="fa fa-circle-o"></i> <?= __('Błąd 500') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/blank'); ?>"><i class="fa fa-circle-o"></i> <?= __('Pusta strona') ?></a></li>
      <li><a href="<?php echo $this->Url->build('/pages/examples/pace'); ?>"><i class="fa fa-circle-o"></i> <?= __('Pace page') ?></a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span><?= __('Wielopoziomowe') ?></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom pierwszy') ?></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom pierwszy') ?>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom drugi') ?></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom drugi') ?>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom trzeci') ?></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom trzeci') ?></a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-circle-o"></i> <?= __('Poziom pierwszy') ?></a></li>
    </ul>
  </li>
  <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span><?= __('Dokumentacja') ?></span></a></li>
  <li class="header"><?= __('ETYKIETY') ?></li>
  <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span><?= __('Ważne') ?></span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span><?= __('Ostrzeżenie') ?></span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span><?= __('Informacja') ?></span></a></li>
  <li><a href="<?php echo $this->Url->build('/pages/debug'); ?>"><i class="fa fa-bug"></i> <span><?= __('Debug') ?></span></a></li>
</ul>
