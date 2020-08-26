<?php
    require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class='container-login'> <!--  full width -->
    <div class="wrapper-login"> <!-- 80% inside full width-->
        <h2>Logar</h2>

        <form action="<?php echo URLROOT; ?>/users/login" method = "POST">
            <input type="text" placeholder="Usuário * " name="username">
            <span class="invalidFeedback">
                <?php echo $data ['usernameError']; ?>
            </span>
            <input type="password" placeholder="Senha * " name="password">
            <span class="invalidFeedback">
                <?php echo $data ['passwordError']; ?>
            </span>
            <button id="submit" type="submit" value="submit">Logar</button>
            <p class="options">Não tem uma conta?<a href="<php echo URLROOT; ?> /users/register">Criar uma conta agora!</a></p>
        </form>
    </div>
</div>