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
                        <form action="http://localhost:8888/sensus/index.php/penduduk/doeditpenduduk" method="POST">
                            <div class="field">
                                <label for="#nik" class="label">NIK</label>
                                <div class="control">
                                    <input type="number" value=<?= $penduduk[0]['nik'] ?> class="input" id="nik" name="nik" placeholder="e.g 181111001">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Nama</label>
                                <div class="control">
                                    <input type="text" value="<?= $penduduk[0]['nama'] ?>" class="input" id="nama" name="nama" placeholder="e.g John Doe">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#tempat" class="label">Tempat</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['tempat'] ?>  class="input" id="tempat" name="tempat" placeholder="e.g Malang">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#tgl" class="label">Tanggal Lahir</label>
                                <div class="control">
                                    <input type="date" value=<?= $penduduk[0]['tgl_lahir'] ?>  class="input" data-date-format="YYYY-MM-DD" data-display-mode="inline" id="tgl" name="tgl">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#jk" class="label">Jenis Kelamin</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="jk" id="jk">
                                            <option disabled="true" selected="true"> Pilih Jenis Kelamin </option>
                                            <option value="Laki - Laki"> Laki - Laki </option>
                                            <option value="Perempuan"> Perempuan </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="#rtrw" class="label">RT/RW</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['RT/RW'] ?>  class="input" id="rtrw" name="rtrw" placeholder="e.g 01/01">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#pekerjaan" class="label">Pekerjaan</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['pekerjaan'] ?>  class="input" id="pekerjaan" name="pekerjaan" placeholder="e.g Wirausaha">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#kewarganegaraan" class="label">Kewarganegaraan</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['kewarganegaraan'] ?>  class="input" id="kewarganegaraan" name="kewarganegaraan" placeholder="e.g Indonesia">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#pendidikanterakhir" class="label">Pendidikan Terakhir</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['pendidikan_terakhir'] ?>  class="input" id="pendidikanterakhir" name="pendidikanterakhir" placeholder="e.g Sarjana Teknik Informatika">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#agama" class="label">Agama</label>
                                <div class="control">
                                    <input type="text" value=<?= $penduduk[0]['agama'] ?>  class="input" id="agama" name="agama" placeholder="e.g Islam">
                                </div>
                            </div>
                            <div class="field">
                                <label for="#golongandarah" class="label">Golongan Darah</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="golongandarah" id="golongandarah">
                                            <option value="" disabled="true" selected="true"> Pilih Golongan Darah </option>
                                            <option value="A"> A </option>
                                            <option value="B"> B </option>
                                            <option value="B"> AB </option>
                                            <option value="B"> O </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <button class="button is-primary"> Simpan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Sidebar -->
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
</body>
</html>