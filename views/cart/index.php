<?php include ROOT .'/views/layouts/header.php' ?>
        <section>
            <div class="container">
                <div class="row">
<?php include ROOT .'/views/layouts/navigation.php' ?>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Корзина</h2>
                            
                            <?php if ($productsInCart): ?>
                            <p>Вы выбрали такие товары:</p>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Код товара</th>
                                    <th>Название</th>
                                    <th>Стоимость, руб</th>
                                    <th>Количество, шт</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product['code'] ?></td>
                                    <td><a href="/product/<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                                    <td><?= $product['price'] ?></td>
                                    <td><?= $productsInCart[$product['id']] ?></td>
                                    <td><a href="/cart/delete/<?= $product['id'] ?>"><i class="fa fa-times"></i></a></td>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="4">Общая стоимость:</td>
                                    <td><?= $totalPrice ?></td>
                                </tr>
                            </table>

                            <a href="/cart/checkout"><button class="btn btn-default"><i class="fa fa-shopping-cart"></i> Оформить заказ</button></a>
                            <?php else: ?>
                            <p>Корзина пуста</p>
                            <?php endif ?>

                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
