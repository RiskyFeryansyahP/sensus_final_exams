<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Signin - Sensus Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>

    <?php echo validation_errors(); ?>
    
    <section class="hero has-background-white-ter is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-dekstop is-3-widescreen">
                        <?php 
                            if ($err == true) {
                        ?>
                    <article class="message is-danger">
                        <div class="message-header">
                            Login Failed
                        </div>
                        <div class="message-body">
                            <?= $messageErr; ?>
                        </div>
                    </article>
                        <?php
                            }
                        ?>
                        <form method="POST" action="http://localhost:8888/sensus/index.php/auth/doSignin" class="box">
                            <h3 class="title is-3">Petugas Sensus Penduduk</h3>
                            <div class="field">
                                <label for="" class="label"> ID Login </label>
                                <div class="control has-icons-left">
                                    <input type="number" name="id" id="id" class="input" placeholder="e.g 181111088" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label for="" class="label"> Password </label>
                                <div class="control has-icons-left">
                                    <input type="password" name="password" id="password" class="input" placeholder="******" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <button type="submit" class="button is-info">
                                    Signin
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</body>
</html>