<?php

\app\assets\authAsset::register($this);
?>




    <main>
        <div class="authorization">
            <span class="authorization-span">авторизация</span>
            <form class="title-form" action="#" method="post">
                <input class="input-login-password name" type="text" placeholder="Логин:">
                <input class="input-login-password" type="password" placeholder="Пароль:">
                <p class="checkbox">
                    <input type="checkbox">Оставаться в сети
                </p>
                <p class="registratsiya">
                    У вас еще нет аккаунта? Тогда пройдите
                    процедуру <a href="#">регистрации</a>
                </p>
                <input class="form-button" type="submit" value="войти">
            </form>
        </div>
    </main>