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
        <h2>Cadastrar</h2>

        <form action="<?php echo URLROOT; ?>/users/register" method = "POST">
            <input type="text" placeholder="Usuário * " name="username">
            <span class="invalidFeedback">
                <?php echo $data ['usernameError']; ?>
            </span>

            <input type="text" placeholder="Email * " name="email">
            <span class="invalidFeedback">
                <?php echo $data ['emailError']; ?>
            </span>
            
            <input type="password" placeholder="Senha * " name="password">
            <span class="invalidFeedback">
                <?php echo $data ['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirmar Senha * " name="confirmPassword">
            <span class="confirmPasswordFeedback">
                <?php echo $data ['passwordError']; ?>
            </span>
            <button id="submit" type="submit" value="submit">Logar</button>
            
        </form>
    </div>
</div>