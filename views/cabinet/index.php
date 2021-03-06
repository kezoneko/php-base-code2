<?php include ROOT .'/views/layouts/header.php' ?>

        <section>
            <div class="container">
                <div class="row">

                    <h1>Кабинет пользователя</h1>

                    <h3>Привет, <?= ($user) ? "{$user['name']}" : 'NONAME' ?></h3>
                    <ul>
                        <li><a href="/cabinet/edit">Редактировать данных</a></li>
                        <li><a href="/user/history">Список покупок</a></li>
                        <?= (User::isAdmin()) ? '<li><a href="/admin">Админпанель</a></li>' : '' ?>
                    </ul>
                    
                </div>
            </div>
        </section>

<?php include ROOT .'/views/layouts/footer.php' ?>
