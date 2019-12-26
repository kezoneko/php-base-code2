<?php include ROOT .'/views/layouts/header.php' ?>

        <section>
            <div class="container">
                <div class="row">
                
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <li> - <?= $error ?></li>
                    <?php endforeach ?>
                    </ul>
                <?php endif ?>

                    <div class="col-sm-4 col-sm-offset-4 padding-right">
                        <div class="signup-form"><!--signup-form-->
                            <h2>Вход на сайт</h2>
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="E-mail" value="<?= $email ?>">
                                <input type="password" name="password" placeholder="Пароль" value="<?= $password ?>">
                                <input type="submit" name="submit" class="btn btn-default" value="Вход">
                            </form>
                        </div><!--/sign up form-->

                        <br/>
                        <br/>

                    </div>
                </div>
            </div>
        </section>
        


        
<?php include ROOT .'/views/layouts/footer.php' ?>
