<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Certificados</title>
<style>
@page landscape {
        size: landscape;
}

body {
        font-family: Arial;
        font-size: 22px;
        text-align: center;
        padding: 0;
}

h1 {
        font-size: 50px;
        text-transform: uppercase;
}

#certificado {
        border: 1px solid #000;
        border-radius: 5px;
        margin: auto;
        padding: 20px 40px;
        width: 920px;
}

p.texto {
        margin: 70px 0;
}

p.assinatura {
        display: inline-block;
        font-size: 18px;
        margin: 0 30px 0 200px;
        padding-top: 140px;
        position: relative;
        width: 300px;
}

p.assinatura img {
        position: absolute;
        right: 50px;
        top: 20px;
}

p.validacao {
        display: inline-block;
        font-size: 13px;
        text-align: left;
        width: 380px;
}
</style>
</head>
<body>
<div id="certificado">
        <div class="logo"></div>
        <h1>Certificado</h1>
        <p class="texto">Certificamos que <strong><?php echo $user['Usuario']['nome'] ?></strong> participou do Do FISL 2014, no d, com uma carga horária total de 50 horas.</p>>.</p>
        <p class="assinatura">
        <img src="{{ STATIC_URL }}img/assinou.png">
        <strong>Unieventos</strong>
        <br />Organizador do evento</p>
</div>
</body>
</html>