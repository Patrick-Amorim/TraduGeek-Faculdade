<?php
if(isset($_POST['submit'])){
  
  include_once('c.php');

  // Captura dos valores do formulário
  $nome = $_POST['name'];
  $dataNascimento = $_POST['dataNascimento'];
  $sexo = $_POST['sexo'];
  $nomeMaterno = $_POST['nomeMaterno'];
  $cpf = $_POST['cpf'];
  $email = $_POST['email'];
  $telefoneCelular = $_POST['telefoneCelular'];
  $telefoneFixo = $_POST['telefoneFixo'];
  $cep = $_POST['cep'];
  $logradouro = $_POST['logradouro'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $complemento = $_POST['complemento'];
  $numero = $_POST['numero'];
  $login = $_POST['login'];
  $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha
$status = 1;
  // Preparação da query para evitar SQL Injection
  $stmt = $conexao->prepare("INSERT INTO usuario (nome, dataNascimento, sexo, nomeMaterno, cpf, email, telefoneCelular, telefoneFixo, cep, logradouro, bairro, cidade, estado, complemento, numero, usuario_login, senha, status) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Bind dos parâmetros
  $stmt->bind_param("sssssssssssssssssi", $nome, $dataNascimento, $sexo, $nomeMaterno, $cpf, $email, $telefoneCelular, $telefoneFixo, $cep, $logradouro, $bairro, $cidade, $estado, $complemento, $numero, $login, $senha, $status);
  // Execução da query
  if ($stmt->execute()) {
    // Redireciona o usuário para uma nova página
    header("Location: resultadoCad.php");
    exit(); // Importante para interromper a execução do script após o redirecionamento
  } else {
    echo "Erro: " . $stmt->error;
  }

  // Fechamento da declaração e da conexão
  $stmt->close();
  $conexao->close();
}
?>



<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - TraduGeek 👾</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Consolas&family=Courier+New&family=Source+Code+Pro&display=swap">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Voltar à tela principal</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <button class="mudarTema" id="altTema" title="Alternar Tema">☀️</button>
        </nav>
    </header>

    <main>
        <div id="cherry-blossoms"></div>

        <div class="signup-container">
            <div class="signup-box">
                <h2 id="typing">Cadastro</h2>
                <form id="form" action="cadastro.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" id="name" name="name" minlength="15" maxlength="80" required class="field" oninput="validarNome();">
                        <span id="nameErro" class="span-required" style="display:none;">Nome deve ter no mínimo 15 caracteres</span>
                    </div>

                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo" required class="field" oninput="validarSexo();">
                            <option value="" disabled selected>Selecione</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                            <option value="prefiro-nao-dizer">Prefiro não informar</option>
                        </select>
                        <span id="sexoErro" class="span-required" style="display: none;">Selecione uma opção válida para o sexo!</span>
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" maxlength="14" required class="field" oninput="validarCPF()" oninput="mascararCPF(this)">
                        <span id="cpfErro" class="span-required" style="display: none;">Informe um CPF válido!</span>
                    </div>

                    <div class="form-group">
                        <label for="dob">Data de Nascimento</label>
                        <input type="date" id="dob" name="dataNascimento" required class="field" oninput="validarDataNascimento();">
                        <span id="dobErro" class="span-required" style="display: none;">Data de nascimento posterior à data atual!</span>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="xxxx@xxxx.com" required class="field" oninput="validarEmail()">
                        <span id="emailErro" class="span-required" style="display: none;">Informe um E-mail válido!</span>
                    </div>

                    <div class="form-group">
                        <label for="celular">Telefone Celular</label>
                        <input type="tel" id="celular" name="telefoneCelular" required class="field" maxlength="15" placeholder="(xx) xxxxx-xxxx" oninput="validarTelefoneCelular()">
                        <span id="celularErro" class="span-required" style="display: none;">Insira um número válido!</span>
                    </div>

                    <div class="form-group">
                        <label for="telFixo">Telefone Fixo</label>
                        <input type="tel" id="telFixo" name="telefoneFixo" class="field" maxlength="14" placeholder="(xx) xxxx-xxxx" oninput="validarTelefoneFixo()">
                        <span id="telFixoErro" class="span-required" style="display: none;">Atenção, informe um número válido!</span>
                    </div>

                    <div class="form-group">
                        <label for="nome-materno">Nome Materno</label>
                        <input type="text" id="nome-materno" name="nomeMaterno" minlength="15" maxlength="80" required class="field" oninput="validarNomeMaterno()">
                        <span id="maternoErro" class="span-required" style="display: none;">Nome deve ter no mínimo 15 caracteres</span>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" required class="field" maxlength="9" placeholder="xxxxx-xxx" oninput="validarCEP(); buscarEnderecoPorCEP(this.value, this);">
                        <span id="cepErro" class="span-required" style="display: none;">CEP inválido!</span>
                    </div>

                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" id="logradouro" name="logradouro" required class="field">
                        <span id="logradouroErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" id="numero" name="numero" required class="field" maxlength="10" oninput="validarNumero()">
                        <span id="numeroErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="field" maxlength="50">
                        <span id="complementoErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" name="bairro" required class="field">
                        <span id="bairroErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" name="cidade" required class="field">
                        <span id="cidadeErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" name="estado" required class="field">
                        <span id="estadoErro" class="mensagemErro" style="display: none;"></span>
                    </div>

                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" id="login" name="login" required class="field" maxlength="6" oninput="validarLogin()">
                        <span id="loginErro" class="span-required" style="display: none;">Login deve possuir apenas 6 caracteres.</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" required class="field" maxlength="8" oninput="validarSenha()" onkeypress="return bloquearNumeros(event)">
                        <span id="senhaErro" class="span-required" style="display: none;">A senha deve conter exatamente 8 caracteres alfabéticos.</span>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirmação da Senha</label>
                        <input type="password" id="confirm-password" name="confirm-password" required class="field" maxlength="8" oninput="validarConfirmacao()" onkeypress="return bloquearNumeros(event)">
                        <span id="confirmSenhaErro" class="span-required" style="display: none;"></span>
                    </div>

                    <div class="form-buttons">
                        <input type="submit" name="submit" value="Enviar">
                        <input type="reset" value="Limpar Tela">
                    </div>
                </form>

                <div class="signup-info">
                    <p>Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p class="footer-text">"Conhecimento sem limites, traduções sem fronteiras." © 2024 TraduGeek</p>
    </footer>
    <?php 
    include 'botaoVoltarAoTopo.php'; 
    ?>
    <script src="script/cadastro.js"></script>
    <script src="script\altTemaImg.js"></script>
    <script src="script/Jquery.js"></script>
    <script src="script/cpf.js"></script>
</body>
</html>