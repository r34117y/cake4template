<aside class="main-sidebar">
    <!-- Styl panelu bocznego znajduje się w pliku sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php echo $this->element('aside/user-panel'); ?>

        <!-- search form -->
        <?php echo $this->element('aside/form'); ?>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $this->element('aside/sidebar-menu'); ?>

    </section>
    <!-- /.sidebar -->
</aside>
