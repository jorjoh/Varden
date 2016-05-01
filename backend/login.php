<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Online Bildearkiv</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <form action="" method="post">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="username" name="username"/>
                        <label class="mdl-textfield__label" for="username">Username</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="userpass" name="password"/>
                        <label class="mdl-textfield__label" for="userpass">Password</label>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <input type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" name="login" value="logg inn">
                    </div>
                </form>

                <?php
                $login = $_POST['login'];
                if($login){
                    include('inc/functions/validering.php');
                    $username = $_POST['username'];
                    $pass = $_POST['password'];

                    if(validatelogon($username, $pass) == false) {
                        echo "<p style='background: #ff0000;'>FEIL!</p>";
                    }
                    else {
                        session_start();
                        $_SESSION['username'] = $username;
                        header('Location: index.php?side=forside');
                    }
                }

                ?>
            </div>

        </div>
    </main>
</div>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>


<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>