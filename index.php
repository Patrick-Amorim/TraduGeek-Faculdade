<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraduGeek 👾</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Consolas&family=Courier+New&family=Source+Code+Pro&display=swap">
    <link rel="stylesheet" href="css\style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- 
        Script/Link para inportar a bliblioteca do swal(SeewtAlert)
        Confira mais em: https://sweetalert.js.org/ 
    -->
    
    <script src="script/artigos.js"></script>
</head>
 
<body>
    <header>
        <nav class="barraNav">
            <span class="olaUsuario">
                <?php
                if (isset($_SESSION['usuario']) && $_SESSION['online']) {
                    echo "Olá, " . htmlspecialchars($_SESSION['usuario']) . "!";
                } else {
                    echo "Olá, Visitante!";
                }
                ?>
            </span>
            <ul>
                <li><a href="#TraduBlog">TraduBlog</a></li>
                <li><a href="#SobreNos">Sobre Nós</a></li>
                <li><a href="#CentralDeAjuda">Central de Ajuda</a></li>
                <li><a href="#Acessibilidade">Acessibilidade</a></li>
                <li><a href="mer.php">MER</a></li>

                <!-- Mostrar opções com base no tipo de usuário -->
                <?php if (isset($_SESSION['online']) && $_SESSION['online'] === true): ?>
                    <?php if ($_SESSION['admin-master']): ?>
                        <!-- Opções para usuário master -->
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="assinatura.php">Assinaturas</a></li>
                        <li><a href="TraduQuiz\index.html">TraduQuiz</a></li>
                    <?php else: ?>
                        <!-- Opções para usuário comum -->
                        <li><a href="assinatura.php">Assinaturas</a></li>
                        <li><a href="usuario.php">Meus Dados</a></li>
                        <li><a href="TraduQuiz\index.html">TraduQuiz</a></li>
                    <?php endif; ?>
                    <li class="logOut"><a href="script/logOut.php">Log Out</a></li>
                <?php else: ?>
                    <!-- Opções para visitantes (não logados) -->
                    <li class="loginNav"><a href="login.php">Login</a></li>
                    <li class="cadastroNav"><a href="cadastro.php">Cadastrar-se</a></li>
                    <li><a href="assinatura.php">Assinaturas</a></li>
                    <li><a href="TraduQuiz\index.html">TraduQuiz</a></li>
                <?php endif; ?>
            </ul>
            <button class="mudarTema" id="altTema" title="Alternar Tema">☀️</button>
        </nav>
    </header>

    <main>
        <div id="cherry-blossoms"></div>

        <!-- Seção TraduGeek -->

        <section class="secaoTraduGeek">
            <div class="signup-box">
            <h1 id="typing">Bem-vindo ao TraduGeek <span id="icon-h1">👾</span></h1>
            </div>
            <div class="conteudoTraduGeek">
                <div class="textoTraduGeek">
                    <p>Welcome ao seu portal de traduções in real-time! Aqui você pode translate arquivos PDF e páginas
                        da web com apenas um clique.
                        ファイル形式を選んで, e pronto, já pode aproveitar sua leitura sem borders! Let’s go, escolha seu formato
                        and dive into a new
                        world de conhecimento.</p>
                    <p>読み始めましょう!</p>
                </div>
                <img src="Imagens/avatar-pamela1.png" id="avatar-pamela-entrada" alt="Avatar da Pâmela" class="avatarPamela">
            </div>
            <div class="botoesTraducao">
                <button>PDF</button>
                <button>WEB</button>
            </div>
        </section>


        <section class="secaoTraduBlog" id="TraduBlog">
            <h2>TraduBlog</h2>
            <div class="conteudoTraduBlog">
                <div class="cardsTraduBlog">
                    <h3>Mangás e Animes</h3>
                    <p>Muitos termos em inglês, como "superhero" e "sci-fi", foram adaptados para o japonês, criando
                        palavras como "スーパーヒーロー"
                        (sūpā hīrō) e "SF" (esefu), refletindo a influência da cultura pop ocidental nos animes e
                        mangás.</p>
                </div>
                <div class="cardsTraduBlog">
                    <h3>Kawaii</h3>
                    <p>A palavra japonesa "kawaii" (かわいい), que significa "fofo", é um conceito central na cultura geek
                        japonesa, influenciando desde
                        a moda até a criação de personagens em jogos e animes.</p>
                </div>
                <div class="cardsTraduBlog">
                    <h3>Palavras em Jogos</h3>
                    <p>Em jogos de RPG, muitos personagens têm nomes em inglês que soam mais impactantes, mas no Japão,
                        esses nomes são frequentemente
                        adaptados em katakana, como "ドラゴン" (doragon) para "dragon".</p>
                </div>
            </div>
        </section>

        <!-- Seção Sobre Nós -->

        <section class="secaoSobreNos" id="SobreNos">
            <h2>Sobre Nós</h2>
            <p>Conheça os mestres por trás do projeto TraduGeek, uma equipe que entende todas as referências!</p>
            <div class="conteudoSobreNos">
                <div class="molduraSobreNos">
                    <div class="avatarIntegrantes">
                        <img src="Imagens/avatar-julio2.jpeg" id="avatar-julio" alt="Avatar Julio">
                    </div>
                    <h2 class="nomeIntegrantes">Julio</h2>
                </div>

                <div class="molduraSobreNos">
                    <div class="avatarIntegrantes" id="avatar--pamela">
                        <img src="Imagens/avatar-pamela2.jpeg" id="avatar-pamela" alt="Avatar Pâmela">
                    </div>
                    <h2 class="nomeIntegrantes">Pâmela</h2>
                </div>

                <div class="molduraSobreNos">
                    <div class="avatarIntegrantes">
                        <img src="Imagens\AvatarRafaelSobreNos.png" id="avatar-rafael" alt="Avatar Rafael">
                    </div>
                    <h2 class="nomeIntegrantes">Rafael</h2>
                </div>

                <div class="molduraSobreNos">
                    <div class="avatarIntegrantes">
                        <img src="Imagens/avatar-rafael1.jpeg" id="avatar-patrick" alt="Avatar Rafael">
                    </div>
                    <h2 class="nomeIntegrantes">Patrick</h2>
                </div>

            </div>
        </section>

        <!-- Seção Central de Ajuda -->

        <section class="secaoCentralDeAjuda" id="CentralDeAjuda">
            <h2>Central de Ajuda</h2>
            <p>Encontre aqui respostas para suas perguntas, tutoriais e suporte para resolver qualquer problema que você
                possa encontrar com nosso
                serviço.</p>

            <!-- Artigos -->

            <div>
                <h3 class="artigo" onclick="toggleTextoArtigo('artigo1')">Como criar uma conta</h3>
                <p id="artigo1" class="textoArtigo oculto">Para criar uma conta, clique em 'Cadastre-se' na página
                    inicial e preencha os campos
                    obrigatórios. Você receberá um e-mail para confirmar seu cadastro.</p>
            </div>

            <div>
                <h3 class="artigo" onclick="toggleTextoArtigo('artigo2')">Como recuperar a senha</h3>
                <p id="artigo2" class="textoArtigo oculto">Para recuperar sua senha, clique em 'Esqueci minha senha' na
                    tela de login. Siga as
                    instruções enviadas para seu e-mail para redefinir sua senha.</p>
            </div>

            <div>
                <h3 class="artigo" onclick="toggleTextoArtigo('artigo3')">Como entrar em contato com o suporte</h3>
                <p id="artigo3" class="textoArtigo oculto">Você pode entrar em contato com o suporte clicando em 'Fale
                    conosco' na parte inferior
                    da página. Preencha o formulário e nossa equipe responderá o mais breve possível.</p>
            </div>
        </section>

        <!-- Seção Acessibilidade -->

        <section class="secaoAcessibilidade" id="Acessibilidade">
            <h2>Acessibilidade</h2>
            <p>Exploradores do ciberespaço, temos recursos para tornar nosso site mais acessível para todos vocês! Use
                as ferramentas abaixo para
                personalizar sua jornada digital e adaptar o site às suas necessidades únicas.</p>
            <div class="ajusteFonteAcessibilidade">
                <button id="aumentarFonte">Aumentar Fonte</button>
                <button id="diminuirFonte">Diminuir Fonte</button>
            </div>
        </section>
        <script src="script/tamanhoDaFont.js"></script>
        <script src="script/altTemaImg.js"></script>
    </main>
    <footer>
        <p class="textoFooter">"Conhecimento sem limites, traduções sem fronteiras." © 2024 TraduGeek</p>
    </footer>
    <?php 
    include 'botaoVoltarAoTopo.php'; 
    include 'verificarLogin.php';
    ?>
</body>

</html>