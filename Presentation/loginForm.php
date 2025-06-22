<?php require_once("header.php"); ?>

<section class="login-container" style="background-color: white; margin:45px auto; padding:15px; display:flex; flex-direction:column; align-items:center; width:35%; border-radius:10px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

    <h2 style="text-align: center;">Login</h2>

    <div class="form">

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="ctrlLogin.php" method="post">
            <div class="email" style="padding-bottom:10px;">
                <label for="txtEmail"><input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail" required></label>
            </div>
            <div class="wachtwoord" style="padding-bottom:10px;">
                <label for="txtWachtwoord"><input type="password" name="txtWachtwoord" id="txtWachtwoord" placeholder="Wachtwoord" required></label>
            </div>
            <div class="button" style="padding-bottom:10px; text-align:center;">
                <input type="submit" value="Inloggen" name="btnLogin" style="padding:8px; background-color: rgb(127, 185, 242); color: white;">
            </div>
        </form>

    </div>

    <div>
        <a href="ctrlRegister.php">Account aanmaken</a>
    </div>

</section>

<?php require_once("footer.php"); ?>