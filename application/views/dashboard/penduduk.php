<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Signin - Sensus Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="http://localhost:8888/sensus/assets/css/style.css">
    <style>
    .menu-container {
        position: fixed !important;
        height:100%;
        top: 85px;
        margin: auto;
        min-width: 300px;
        z-index: 10;
        background-color: transparent;
    }
    </style>
</head>
<body>

    <!-- navbar -->
    <nav class="navbar is-fixed-top box-shadow-y">
        <div class="navbar-brand">
            <a href="#" class="navbar-burger toggler">
            <span></span>
            <span></span>
            <span></span>
            </a>
            <a href="#" class="navbar-item has-text-weight-bold has-text-black">Sensus Penduduk Dashboard</a>
            <a href="#" class="navbar-burger nav-toggler">
            <span></span>
            <span></span>
            <span></span>
            </a>
        </div>
        <div class="navbar-menu has-background-white">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a href="#" class="navbar-link">Admin</a>
                    <div class="navbar-dropdown">
                        <a href="http://localhost:8888/sensus/index.php/auth/dologout" class="navbar-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- Sidebar -->
    <div class="columns is-variable is-0">
        <div>
            <div class="menu-container px-1 has-background-white">
                <div class="menu-wrapper py-1">
                    <aside class="menu">
                        <p class="menu-label">
                            General
                        </p>
                        <ul class="menu-list">
                            <li>
                                <a href="http://localhost:8888/sensus/index.php/dashboard"> <i class="fas fa-tachometer-alt"> </i> Dashboard </a>
                            </li>
                        </ul>
                        <p class="menu-label">
                            Administration
                        </p>
                        <ul class="menu-list">
                            <li><a class="is-active has-background-info">Data Penduduk</a></li>
                            <li><a>Data Kartu Keluarga</a></li>
                            <li><a>Data Pendatang</a></li>
                            <li><a>Data Kematian</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <div class="column is-10-dekstop is-offset-2-dekstop is-9-tablet is-offset-3-tablet is-12-mobile">
            <div class="p-1">
                <div class="columns is-variable is-dekstop">
                    <div class="column">
                        <h1 class="title">Penduduk</h1>
                    </div>
                </div>
                <div class="columns is-variable is-dekstop">
                    <div class="column">
                        <table class="table is-narrow is-hoverable">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>RT/RW</th>
                                    <th>Pekerjaan</th>
                                    <th>Kewarganegaraan</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Agama</th>
                                    <th>Golongan Darah</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($penduduks as $penduduk) {
                                ?>
                                    <tr>
                                        <td> <?= $penduduk['nik']; ?> </td>
                                        <td> <?= $penduduk['nama']; ?> </td>
                                        <td> <?= $penduduk['tempat'] . ", " . $penduduk['tgl_lahir']; ?> </td>
                                        <td> <?= $penduduk['JK']; ?> </td>
                                        <td> <?= $penduduk['RT/RW']; ?> </td>
                                        <td> <?= $penduduk['pekerjaan']; ?> </td>
                                        <td> <?= $penduduk['kewarganegaraan']; ?> </td>
                                        <td> <?= $penduduk['pendidikan_terakhir']; ?> </td>
                                        <td> <?= $penduduk['agama']; ?> </td>
                                        <td> <?= $penduduk['gol_darah']; ?> </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <!-- end Sidebar -->

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>