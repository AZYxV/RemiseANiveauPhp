<?php

include 'header.php';

if(isset($_POST['submit'])) {

    $valid = true;

    $civilite = filter_input(INPUT_POST, 'civilite', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $raison = filter_input(INPUT_POST, 'raison', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            ${"error$key"} = 'Veuillez completer le champs '.$key;
            $valid = false;
        }
    }


    if(strlen($_POST['message'])<5) {
        echo "Votre message dois contenir 5 caractères min";
        $valid = false;
    }
    if (!$email) {
        echo "Adresse email invalide";
        $valid = false;
    }
    if($valid) {
        file_put_contents('Contact'.date("Y-m-d H:i:s"), $civilite." | ".$nom." | ".$prenom." | ".$email." | ".$raison." | ".$message);
    }

}
var_dump($_POST)
?>
<main>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="civilite">Civilité :</label>
        <select name="civilite" id="civilite">
            <option value="M">M</option>
            <option value="Mme">Mme</option>
        </select>
        <br>
        <?php if($errornom) {
                echo $errornom;
            } ?>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <br>
        <?php if($errorprenom) {
            echo $errorprenom;
        } ?>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
        <br>
        <?php if($erroremail) {
            echo $erroremail;
        } ?>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        <br>
        <?php if($errorraison) {
            echo $errorraison;
        } ?>
        <label for="raison">Raison du contact :</label>
        <br>
        <input type="radio" name="raison" value="proposition d'emploi">Proposition d'emploi
        <br>
        <input type="radio" name="raison" value="demande d'information">Demande d'information
        <br>
        <input type="radio" name="raison" value="prestations">Prestations
        <br>
        <?php if($errormessage) {
            echo $errormessage;
        } ?>
        <label for="message">Message :</label>
        <br>
        <textarea name="message" id="message" rows="5" cols="50"></textarea>
        <br>
        <input type="submit" name="submit" value="Envoyer">
    </form>
</main>
<?php include 'footer.php' ?>