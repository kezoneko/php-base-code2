<?php include ROOT .'/views/layouts/header.php' ?>
        <section>
            <div class="container">
                <div class="row">
<?php include ROOT .'/views/layouts/navigation.php' ?>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Корзина</h2>
                            
                            <?php if ($result): ?>
                            <p>Заказ оформлен. Мы Вам перезвоним.</p>
                            <?php else: ?>
                            <p>Выбрано товаров: <?= $totalQuantity ?>, на сумму: <?= $totalPrice ?>, руб</p>
                                <?php if (!$result): ?>
                            <div class="col-sm-4">
                                <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                    <li> - <?= $error ?></li>
                                    <?php endforeach ?>
                                </ul>
                                <?php endif ?>

                                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                                <div class="login-form">
                                    <form action="#" method="post">
                                        
                                        <p>Ваше имя</p>
                                        <input type="text" name="userName" placeholder="" value="<?= $userName ?>">

                                        <p>Номер телефона</p>
                                        <input type="text" name="userPhone" placeholder="" value="<?= $userPhone ?>">

                                        <p>Комментарий к заказу</p>
                                        <textarea name="userComment" id="userComment" cols="30" rows="10"><?= $userComment ?></textarea>

                                        <br><br>
                                        <input type="submit" name="submit" class="btn btn-default" value="Оформить">
                                    </form>
                                </div>
                            </div>
                                <?php endif ?>
                            <?php endif ?>

                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
