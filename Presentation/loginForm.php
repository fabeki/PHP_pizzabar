<?php require_once("header.php"); ?>

<section class="login-container">

    <header>
        <h2>Login</h2>
    </header>

    <div class="form">

        <form action="ctrlLogin.php" method="post">
            <div class="email">
                <label for="txtEmail">E-mail: <input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail" required></label>
            </div>
            <div class="wachtwoord">
                <label for="txtWachtwoord">Wachtwoord: <input type="password" name="txtWachtwoord" id="txtWachtwoord" placeholder="Wachtwoord" required></label>
            </div>
            <div class="button">
                <button type="submit">Inloggen</button>
            </div>
        </form>

    </div>

    <div>
        <a href="registerForm.php">Account aanmaken</a>
    </div>

</section>

<?php require_once("footer.php"); ?>