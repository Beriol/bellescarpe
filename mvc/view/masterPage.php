<?php
include_once 'ViewDescriptor.php';
include_once basename(__DIR__) . '/../Settings.php'; 
?>

<!DOCTYPE html>
<!-- 
     Pagina master, contiene tutto il layout della applicazione 
     le varie pagine vengono caricate a "pezzi" a seconda della zona
     del layout.

     Queste informazioni sono manentute in una struttura dati, chiamata ViewDescriptor
     la classe contiene anche le stringhe per i messaggi di feedback per 
     l'utente (errori e conferme delle operazioni)
-->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?= $viewDescriptor->getTitle()?></title>
        <base href="<?= Settings::getApplicationPath() ?>"/>
        <meta name="keywords" content="bellescarpe" />
        <meta name="description" content="Negozio di scarpe" />
        <link rel="shortcut icon" href="../images/favicon.ico" />
        <script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link href="../css/fixed.css" rel="stylesheet" type="text/css" media="screen" />

    </head>
    <body>
        <div id="page">
            
            <!--  Header -->
            <div id="header">
                <div id="headerContent">
                    <div id="website_logo">
                        <a id="back_to_top">
                            <h1>BelleScarpe.com</h1>
                        </a>
                    </div>

                    <div id="logout">
                        <?php
                        $logout = $viewDescriptor->getLogoutFile();

                        if(isset($logout))
                            require "$logout";
                        ?>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="content">
                <?php
                if($viewDescriptor->getErrorMessage() != null) 
                {
                ?>
                    <div class="error">
                        <?= htmlentities($viewDescriptor->getErrorMessage()) ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if($viewDescriptor->getConfirmationMessage() != null) 
                {
                ?>
                    <div class="confirm">
                        <?= htmlentities($viewDescriptor->getConfirmationMessage()) ?>
                    </div>
                <?php
                }
                ?>
                <?php
                
                $content = $viewDescriptor->getContentFile();
                require "$content";
                ?>
            </div>

            <div style="clear: both; width: 0px; height: 0px;"></div> 
            
            <!-- Footer -->
            <div id="footer">
                <p>
                    BelleScarpe.com
                </p>
                <p>
                    <a href="http://validator.w3.org/check/referer" class="xhtml" title="Questa pagina contiene HTML valido">
                        <abbr title="eXtensible HyperText Markup Language">HTML</abbr> Valido</a>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="Questa pagina ha CSS validi">
                        <abbr title="Cascading Style Sheets">CSS</abbr> Valido</a>
                </p>
            </div>
        </div>
    </body>
</html>
