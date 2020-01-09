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
                            <li><a class="is-active has-background-info">Data Kartu Keluarga</a></li>
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
                        <h1 class="title">Anggota Keluarga</h1>
                    </div>
                </div>
                <div class="columns is-variable is-dekstop">
                    <div class="column">
                        <table class="table is-fullwidth is-narrow is-hoverable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No KK</th>
                                    <th>Nama</th>
                                    <th>Status Dalam Keluarga</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($kks as $kk) {
                                ?>
                                    <tr>
                                        <td> <?= $i ?> </td>
                                        <td> <?= $kk['no_kk']; ?> </td>
                                        <td> <?= $kk['nama']; ?> </td>
                                        <td> <?= $kk['status_dalam_keluarga']; ?> </td>
                                        <td> <?= $kk['ayah']; ?> </td>
                                        <td> <?= $kk['ibu']; ?> </td>
                                        <td>
                                            <button class="button is-warning modal-button" data-target="#modalEdit"
                                                data-kk="<?= $kk['id'] . '-' . $kk['no_kk'] . '-' . $kk['status_dalam_keluarga'] . '-' . $kk['ayah'] . '-' . $kk['ibu'] ?>">
                                                <span class="icon is-small">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </button>
                                            <a onClick="return confirm('Anda yakin ingin menghapus ini ?')" href="http://localhost:8888/sensus/index.php/kartukeluarga/dodeletekartukeluarga/<?= $kk['id'] ?>" class="button is-danger">
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
                        <a class="button is-info is-focused modal-button" data-target="#modalAdd">Tambah Anggota Keluarga</a>
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
                <p class="modal-card-title">Tambah Anggota Keluarga</p>
                <button class="delete button-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form action="http://localhost:8888/sensus/index.php/kartukeluarga/doaddkartukeluarga" method="POST">
                    <div class="field">
                        <label for="#nokk" class="label">No KK</label>
                        <div class="control">
                            <input type="text" class="input" id="nokk" name="nokk" placeholder="e.g 1111111111">
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
                        <label for="#status" class="label">Status Dalam Keluarga</label>
                        <div class="control">
                            <input type="text" class="input" id="status" name="status" placeholder="e.g Anak">
                        </div>
                    </div>
                    <div class="field">
                        <label for="#ayah" class="label">Nama Ayah</label>
                        <div class="control">
                            <input type="text" class="input" id="ayah" name="ayah" placeholder="e.g Stevenaldo">
                        </div>
                    </div>
                    <div class="field">
                        <label for="#Ibu" class="label">Ibu</label>
                        <div class="control">
                            <input type="text" class="input" id="Ibu" name="ibu" placeholder="e.g Suliando">
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
                <p class="modal-card-title">Edit Anggota Keluarga</p>
                <button class="delete button-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form action="http://localhost:8888/sensus/index.php/kartukeluarga/doEditKartuKeluarga" method="POST">
                    <div class="field">
                        <label for="" class="label">id</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="id" placeholder="e.g 1111111111" readonly>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">No KK</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="nokk" placeholder="e.g 1111111111">
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
                        <label for="" class="label">Status Dalam Keluarga</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="status" placeholder="e.g Anak">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Nama Ayah</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="ayah" placeholder="e.g Stevenaldo">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Ibu</label>
                        <div class="control">
                            <input type="text" class="input" id="input" name="ibu" placeholder="e.g Suliando">
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