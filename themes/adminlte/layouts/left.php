<?php
    use app\models\User;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (User::isAdmin()): ?>
                    <?= User::getFotoAdmin(['class' => 'img-circle']); ?>
                <?php endif ?>
                <?php if (User::isPengajar()): ?>
                    <?= User::getFotoPengajar(['class' => 'img-circle']); ?>
                <?php endif ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?php if (User::isAdmin()){ ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    //['label' => 'HOME', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/dashboard']],
                    ['label' => 'PENDAFTARAN','options' => ['class' => 'header']],
                    ['label' => 'Form Pendaftaran', 'icon' => 'fas fa-copy', 'url' => ['pendaftaran/create'],],
                    ['label' => 'Lihat Data Pendaftaran', 'icon' => 'list', 'url' => ['pendaftaran/index'],],
                    ['label' => 'DATA', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Santri',
                        'icon' => 'user-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Lihat Data Santri', 'icon' => 'list', 'url' => ['/santri']],
                            ['label' => 'Tambah Data Santri', 'icon' => 'plus', 'url' => ['/santri/create']],
                        ],
                    ],
                    [
                        'label' => 'Orang Tua',
                        'icon' => 'user-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Tambah Data Orang Tua', 'icon' => 'plus', 'url' => ['orangtua/create']],
                            ['label' => 'Lihat Data Orang Tua', 'icon' => 'list', 'url' => ['/orangtua']],
                        ],
                    ],
                    [
                        'label' => 'Syahriyah', 
                        'icon' => 'dollar', 
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Lihat Data Syahriyah', 'icon' => 'dollar', 'url' => ['/syahriyah']],
                            ['label' => 'Tambah Data Syahriyah', 'icon' => 'plus', 'url' => ['/syahriyah/create']],
                            //['label' => 'Tabel Statistik', 'icon' => 'list', 'url' => ['/syahriyah/tabel']],
                        ],
                    ],
                    ['label' => 'Kelas', 'icon' => 'list', 'url' => ['/kelas']],
                    ['label' => 'Pengantar Tes', 'icon' => 'fas fa-copy', 'url' => ['/pengantar-tes']],
                    ['label' => 'Pengajar', 'icon' => 'user-o', 'url' => ['/pengajar/index']],
                    ['label' => 'Laporan', 'icon' => 'print', 'url' => ['/site/laporan']],
                    [
                        'label' => 'Kategori',
                        'icon' => 'fa fa-bars',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jilid', 'icon' => 'book', 'url' => ['/jilid']],
                            ['label' => 'Tahun Ajaran', 'icon' => 'calendar', 'url' => ['/tahun-ajaran']],
                            ['label' => 'Kategori Syahriyah', 'icon' => 'fas fa-bars', 'url' => ['/katsyah']],
                            ['label' => 'Pendidikan', 'icon' => 'fas fa-graduation-cap', 'url' => ['/pendidikan']],
                            ['label' => 'Pekerjaan', 'icon' => 'fas fa-bars', 'url' => ['/pekerjaan']],
                        ],
                    ],
                    // ['label' => 'TESTING','options' => ['class' => 'header']],
                    // ['label' => 'Testing', 'icon' => 'fas fa-copy', 'url' => ['testing/index'],],
                    //['label' => 'KATEGORI','options' => ['class' => 'header']],
                    
                    ['label' => 'SISTEM','options' => ['class' => 'header']],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['user/index'],],
                ],
            ]
        ) ?>

      <?php } elseif(User::isPengajar()) {?>
      <?= dmstr\widgets\Menu::widget(
            [
                 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/dashboard']],
                    ['label' => 'DATA', 'options' => ['class' => 'header']],
                    ['label' => 'Santri', 'icon' => 'user-o', 'url' => ['/kelas/index']],
                    ['label' => 'Pengantar Test', 'icon' => 'user-o', 'url' => ['/pengantar-tes']],
                ],   
            ]
        ) ?>
    <?php } ?>
    </section>
</aside>