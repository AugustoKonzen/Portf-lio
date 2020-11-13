<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<!-- Navbar -->
<nav class="grey">
    <div class="container">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><i class="material-icons">face</i></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.html">Home</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="#formacoes">Formações</a></li>
                <li><a href="#sobreMim">Sobre Mim</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="index.html">Home</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="#formacoes">Formações</a></li>
                <li><a href="#sobreMim">Sobre Mim</a></li>
            </ul>
        </div>
</nav>

<!-- Conteúdo -->
<!-- Sobre Mim -->
<section id="sobreMim" class="scrollspy">
    <br>
    <h5><center>Sobre Mim</center></h5>
    <hr>

    <div class="row container">
        <div class="card horizontal small z-depth-0">
            <div class="card-image">
                <img class="responsive-img" src="https://imgur.com/qQxnxuM.png">
            </div>
            <div class="card-stacked">
                <div class="card-content center">
                    <span class="card-title"><br><br><strong><i>Quem Sou</i></strong></span>
                    <p>Meu nome é Augusto Ivan Konzen, sou um estudante de programação e amante da
                        tecnologia. Desde meu primeiro contato com um computador passei a gostar muito
                        de jogos eletrônicos e quando descobri os vídeos fiquei facinado por edição.
                        Além disso, sempre gostei de ler, principalmente livros de ficção e também adoro
                        programar.<p>
                </div>
            </div>
        </div>
        <div class="card horizontal small z-depth-0">
            <div class="card-image">
                <img class="responsive-img" src="https://imgur.com/MfEvlJm.png">
            </div>
            <div class="card-stacked">
                <div class="card-content center">
                    <span class="card-title"><br><br><strong><i>Games</i></strong></span>
                    <p>Como sempre gostei de jogar conheço vários jogos eletrônicos. Alguns dos
                        meus preferidos são Paladins, Point Blank, Minecraft e Hellpoint. Além disso,
                        também gosto muito de algumas franquias de jogos como Mortal Kombat, Resident Evil,
                        God of War e Assassin's Creed.<p>
                </div>
            </div>
        </div>
        <div class="card horizontal small z-depth-0">
            <div class="card-image">
                <img class="responsive-img" src="https://imgur.com/Vv23654.png">
            </div>
            <div class="card-stacked">
                <div class="card-content center">
                    <span class="card-title"><br><br><strong><i>Programming</i></strong></span>
                    <p>Desde que conheci um computador ficava imaginando como todos aqueles programas
                        que via eram feitos e isso me levou a cursar programação. Logo que conheci a
                        programação e comecei a fazer meus códigos, fiquei apaixonado por isso e resolvi
                        seguir o curso pois sabia que aquilo era o que queria fazer. Atualmente estou
                        aprendendo a desenvolver em Java e em PHP HTML 5, mas, futuramente, desejo
                        aprender também outras linguagens, como C e Python.<p>
                </div>
            </div>
        </div>
</section>

<!-- Formações -->
<section id="formacoes" class="scrollspy">
    <br>
    <h5><center>Formações</center></h5>
    <hr>

    <div class="row container">
        <div class="card horizontal large z-depth-0">
            <div class="card-image">
                <img class="responsive-img" src="https://imgur.com/eaOC9Kc.png">
            </div>
            <div class="card-stacked">
                <div class="card-content center">
                    <span class="card-title"><br><br><strong><i>Minhas Formações</i></strong></span>
                    <p>No ano de 2015 terminei meu Ensino Fundamental e no ano de 2018 terminei o
                        Ensino Médio, porém nesse meio tempo, como sempre gostei de tudo ligado a
                        computação, fiz alguns cursos para aprender mais sobre o assunto. No ano de
                        2013 me formei no curso de Informática Básica contendo
                        Windows Seven, Word 2010, Excel 2010, Power Point 2010, Internet 2011 e
                        Mídias Sociais. Já no ano seguinte, em 2014, me formei no curso de Informática
                        contendo Fireworks CS5, CorelDraw X5, Flash CS5 e Photoshop CS5.
                        Ambos os cursos foram feitos na escola Datawork. Não só isso, mas, ainda no
                        Ensino Fundamental, participei de um concurso de leitura em lingua alemã, no qual,
                        na fase municipal ganhei o primeiro lugar e na fase regional o terceiro lugar.
                        Além disso, no Ensino Médio, quando estava no segundo ano, participei de uma
                        bolsa CNPq em Química e durante a mesma, tive o artigo
                        "As Revistas de Divulgação Científica e o Ensino de Química uma Relação Possível?"
                        publicado no livro
                        <a href="http://www.editorafaith.he.com.br/ebooks/grat/978-85-68221-25-9.pdf"
                           target="_blank">"Aprendendo Ciências: Pesquisa"</a> da
                        <a href="http://www.editorafaith.he.com.br/" target="_blank">Editora Faith</a>.
                </div>
            </div>
        </div>
</section>

<!-- Footer -->
<footer class="page-footer grey darken-3 scrollspy" id="contato">
    <center><h5>Contato</h5></center>
    <br><br>
    <div class="row">
        <form class="col s12 m12 l9" method="post" action="Contato.php">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="name" name="nome" autocomplete="off" class="validate" required>
                <label for="name">Nome</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="email" id="mail" name="email" class="validate" autocomplete="off" required>
                <label data-error="E-mail inválido!" for="mail">Email</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input type="tel" id="phone" name="telefone" class="validate" autocomplete="off">
                <label for="phone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="message" name="mensagem" autocomplete="off" class="validate" required>
                <label for="message">Mensagem</label>
            </div>
            <center><button class="btn waves-effect waves-light indigo darken-4" type="submit">Enviar
                </button></center>
        </form>
        <div class="col s12 m12 l3">
            <p><center>Telefone para contato:<br>(55)99612-5689<br>E-mail para contato:<br>
                augusto.konzen@yahoo.com.br</center></p>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <br>
            <center>© 2020 Develeped by - Augusto Ivan Konzen</center>
        </div>
    </div>
</footer>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Materialize JS -->
<script src="js/materialize.js"></script>

<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav();
        $('.scrollspy').scrollSpy({scrollOffset:0});
    });
</script>
</body>
</html>