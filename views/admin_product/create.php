<?php include ROOT .'/views/layouts/header_admin.php' ?>

<section>
    <div class="container">
        <div class="row">
            
            <br>

            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ul>
            </div>

            <h4>Добавить новый товар</h4>

<?php if (isset($errors) && is_array($errors)):?>
    <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
    <?php endforeach ?>
<?php endif ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="">

                        <p>Стоимость, &#8381;</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id" id="category_id">
<?php if (is_array($categoriesList)): ?>
    <?php foreach ($categoriesList as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
    <?php endforeach ?>
<?php endif ?>
                        </select>

                        <br><br>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="">

                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>

                        <br><br>

                        <p>Наличие на складе</p>
                        <select name="availability" id="availability">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br><br>

                        <p>Новинка</p>
                        <select name="is_new" id="is_new">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br><br>

                        <p>Рекомендуемые</p>
                        <select name="is_recommended" id="is_recommended">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br><br>

                        <p>Статус</p>
                        <select name="status" id="status">
                            <option value="1" selected>Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" value="Добавить" class="btn btn-default">

                        <br><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT .'/views/layouts/footer_admin.php' ?>
