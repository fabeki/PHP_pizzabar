<?php require_once("header.php"); ?>

<section class="register-container">

    <header>
        <h2>Registreren</h2>
    </header>

    <div class="form">

        <form action="ctrlRegister.php" method="post">

            <div class="labels">
                <label for="txtVoornaam">Voornaam:
                    <input type="text" name="txtVoornaam" placeholder="Vul hier voornaam in." required>
                </label>
            </div>

            <div class="labels">
                <label for="txtFamilienaam">Familienaam:
                    <input type="text" name="txtFamilienaam" placeholder="Vul hier uw familienaam in." required>
                </label>
            </div>


            <div class="labels">
                <label for="txtStraat">Straat:
                    <input type="text" name="txtStraat" placeholder="Vul hier uw straat in." required>
                </label>
            </div>

            <div class="labels">
                <label for="txtHuisnummer">Huisnummer:
                    <input type="number" name="txtHuisnummer" placeholder="Vul hier uw huisnummer in." required>
                </label>
            </div>

            <div class="labels">
                <label for="txtPostcode">Postcode:
                    <input type="number" name="txtPostcode" placeholder="Vul hier uw postcode in." required>
                </label>
            </div>

            <div class="labels">
                <label for="txtWoonplaats">Woonplaats:
                    <input type="text" name="txtWoonplaats" placeholder="Vul hier uw woonplaats in." required>
                </label>
            </div>

            <div class="labels">
                <label for="txtTelefoon">Telefoon:
                    <input type="tel" name="txtTel" placeholder="Vul hier uw telefoonnummer in.">
                </label>
            </div>

            <div class="labels">
                <label for="txtEmail">E-mail: <input type="email" name="txtEmail" id="txtEmail" placeholder="example@hotmail.com" required></label>
            </div>

            <div class="labels">
                <label for="txtWachtwoord">Wachtwoord: <input type="password" name="txtWachtwoord" id="txtWachtwoord" placeholder="Vul hier uw wachtwoord in." required></label>
            </div>

            <div class="labels">
                <label for="txtWachtwoordHerhaal">Herhaal wachtwoord: <input type="password" name="txtWachtwoordHerhaal" id="txtWachtwoordHerhaal" placeholder="Herhaal uw wachtwoord." required></label>
            </div>

            <div class="button">
                <input type="submit" value="Registreren" name="btnRegistreer">
            </div>

        </form>

    </div>

</section>

<?php require_once("footer.php"); ?>