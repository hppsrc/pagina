<!-- * Cross header -->
<?php 
    echo '
        <header>
            <a href="inicio.php" style="text-decoration: none; color: #000" title="Ir a pagina principal">
                <img alt="Logo de CulturaTech" title="CulturaTech" src="res\icons\smile.svg" width="64px">
                <div id="divcol">
                    <h1> CulturaTech </h1>
                    <p><small> Slogan de culturaTech</small></p>
                </div>
            </a>
            <div id="divcol" style="text-align: right;">
                <p id="username"><b> (Sin acceder) </b></p>
                <p id="userrole"><b> Invitado </b></p>
                <p id="actions"> Acciones </p>
            </div>
        </header>
        <nav id="nav">
        <a href="registro.php">Acceder / Registrarse</a>
        </nav>
    ';
?>