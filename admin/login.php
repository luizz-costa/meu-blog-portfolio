<?php


if (isset($_POST['email']) && isset($_POST['password'])) {

  require_once('../includes/conexao.php');


  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $user = $stmt->get_result()->fetch_assoc();

  // Mesma mensagem para e-mail e senha errados: não revela quais e-mails existem
  if (!$user || !password_verify($password, $user['password'])) {
    echo "E-mail ou senha incorretos";
  } else {
    if (session_status() !== PHP_SESSION_ACTIVE)
      session_start();
    // Novo ID de sessão no login, contra fixação de sessão
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['is_admin'] = $user['admin'];
    header("Location: dashboard.php");
    exit;
  }
}



?>



<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login - Painel Admin</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>


<body class="auth-page">
  <main class="auth-container">
    <div class="auth-card">
      <h1>Login</h1>
      <form action="" method="POST">
        <label>
          <span class="label">E-mail</span>
          <input name="email" type="email" placeholder="seu@exemplo.com" required>
        </label>
        <label>
          <span class="label">Senha</span>
          <input name="password" type="password" placeholder="••••••••" required>
        </label>
        <!-- fazer validacao de login e redirecionar para dashboardphp -->
        <button type="submit" class="btn">Entrar</button>
      </form>
    </div>
  </main>
  <script src="assets/js/script.js"></script>
</body>

</html>