<?php


if (isset($_POST['email']) && isset($_POST['password'])) {

  require_once('../includes/conexao.php');


  $email = $mysqli->escape_string($_POST['email']);
  $password = $_POST['password'];

  $sql_code = "SELECT * FROM users WHERE email = '$email'";
  $sql_query = $mysqli->query($sql_code) or die($mysqli->error);


  if ($sql_query->num_rows == 0) {
    echo "O e-mail informado esta incorreto";
  } else {
    $user = $sql_query->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
      echo "A senha informada esta incorreta";
    } else {
      if (!isset($_SESSION))
        session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['is_admin'] = $user['admin'];
      header("Location: dashboard.php");
    }
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