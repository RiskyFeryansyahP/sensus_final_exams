<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Signin - Sensus Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="http://localhost:8888/sensus/assets/css/bulma-calendar.min.css">
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
                            <li><a>Data Penduduk</a></li>
                            <li><a>Data Kartu Keluarga</a></li>
                            <li><a class="is-active has-background-info">Data Pendatang</a></li>
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
                        <h1 class="title">Data Pendatang</h1>
                    </div>
                </div>
                <div class="columns is-variable is-dekstop">
                    <div class="column">
                        <table class="table is-fullwidth is-narrow is-hoverable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal Datang</th>
                                    <th>Alamat Asal</th>
                                    <th>Alamat Sekarang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($pendatangs as $pendatang) {
                                ?>
                                    <tr>
                                        <td> <?= $i ?> </td>
                                        <td> <?= $pendatang['nama']; ?> </td>
                                        <td> <?= $pendatang['tgl_datang']; ?> </td>
                                        <td> <?= $pendatang['alamat_asal']; ?> </td>
                                        <td> <?= $pendatang['alamat_sekarang']; ?> </td>
                                        <td>
                                            <button class="button is-warning modal-button" data-target="#modalEdit"
                                                data-kk="<?= $pendatang['no_pendatang'] . '-' . $pendatang['alamat_asal']. '-' . $pendatang['alamat_sekarang'] ?>">
                                                <span class="icon is-small">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </button>
                                            <a onClick="return confirm('Anda yakin ingin menghapus ini ?')" href="http://localhost:8888/sensus/index.php/pendatang/dodeletependatang/<?= $pendatang['no_pendatang'] ?>" class="button is-danger">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        <a class="button is-info is-focused modal-button" data-target="#modalAdd">Tambah Data Pendatang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Sidebar -->

    <!-- modal -->
    <div class="modal" id="modalAdd">
    <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Tambah Data Pendatang</p>
                <button class="delete button-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form action="http://localhost:8888/sensus/index.php/pendatang/doaddpendatang" method="POST">
                    <div class="field">
                        <label for="#nik" class="label">NIK</label>
                        <div class="control">
                            <div class="select">
                                <select name="nik" id="nik">
                                   <?php
                                        foreach ($penduduks as $penduduk) {
                                    ?>
                                        <option value="<?= $penduduk['nik'] ?>"> <?= $penduduk['nik'] . ' - ' . $penduduk['nama'] ?> </option>
                                    <?php
                                        }
                                   ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="#tgldatang" class="label">Tanggal Datang</label>
                        <div class="control">
                            <input type="date" class="input" data-date-format="YYYY-MM-DD" data-display-mode="inline" id="tgldatang" name="tgldatang" placeholder="e.g Jakarta">
                        </div>
                    </div>
                    <div class="field">
                        <label for="#alamatasal" class="label">Alamat Asal</label>
                        <div class="control">
                            <input type="text" class="input" id="alamatasal" name="alamatasal" placeholder="e.g Jakarta">
                        </div>
                    </div>
                    <div class="field">
                        <label for="#alamatsekarang" class="label">Alamat Sekarang</label>
                        <div class="control">
                            <input type="text" class="input" id="alamatsekarang" name="alamatsekarang" placeholder="e.g Malang">
                        </div>
                    </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success">Simpan</button>
                <button class="button button-cancel">Cancel</button>
            </footer>
            </form>
        </div>
    </div>
    <!-- end modal -->

    <!-- modal edit -->
    <div class="modal" id="modalEdit">
    <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Edit Data Pendatang</p>
                <button class="delete button-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form action="http://localhost:8888/sensus/index.php/pendatang/doeditpendatang" method="POST">
                    <div class="field">
                        <label for="" class="label">No Pendatang</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="nopendatang" placeholder="">
                        </div>
                    </div>
                    <div class="field">
                        <label for="#nik" class="label">NIK</label>
                        <div class="control">
                            <div class="select">
                                <select name="nik" id="nik">
                                   <?php
                                        foreach ($penduduks as $penduduk) {
                                    ?>
                                        <option value="<?= $penduduk['nik'] ?>"> <?= $penduduk['nik'] . ' - ' . $penduduk['nama'] ?> </option>
                                    <?php
                                        }
                                   ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Tanggal Datang</label>
                        <div class="control">
                            <input type="date" class="input" data-date-format="YYYY-MM-DD" data-display-mode="inline" id="" name="tgldatang" placeholder="e.g Jakarta">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Alamat Asal</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="alamatasal" placeholder="e.g Jakarta">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Alamat Sekarang</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="alamatsekarang" placeholder="e.g Malang">
                        </div>
                    </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success">Simpan</button>
                <button class="button button-cancel">Cancel</button>
            </footer>
            </form>
        </div>
    </div>
    <!-- end modal -->

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="http://localhost:8888/sensus/assets/js/bulma-calendar.min.js"></script>
    <script>
        // Initialize all input of date type.
        const calendars = bulmaCalendar.attach('[type="date"]');

        // Loop on each calendar initialized
        calendars.forEach(calendar => {
            // Add listener to date:selected event
            calendar.on('date:selected', date => {
                console.log(date);
            });
        });

        // To access to bulmaCalendar instance of an element
        const element = document.querySelector('#tgl');
        if (element) {
            // bulmaCalendar instance is available as element.bulmaCalendar
            element.bulmaCalendar.on('select', datepicker => {
                console.log(datepicker.data.value());
            });
        }
    </script>
    <script>
        document.querySelectorAll('.modal-button').forEach((element) => {
            element.addEventListener('click', () => {
                const target = document.querySelector(element.getAttribute('data-target'))

                let data = element.getAttribute('data-kk')
                if (data != null) {
                    console.log(data)
                    data = data.split('-')

                    let input = document.querySelectorAll('#input')
                    console.log(input.length)

                    for (let i = 0; i < input.length; i++) {
                        input[i].value = data[i]
                    }
                }

                target.classList.add('is-active')

                target.querySelector('.button-close').addEventListener('click', () => {
                    target.classList.remove('is-active')
                })

                target.querySelector('.button-cancel').addEventListener('click', () => {
                    target.classList.remove('is-active')
                })
            })
        })
    </script>
</body>
</html>