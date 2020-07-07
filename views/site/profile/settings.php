<div class="account-view">

<div class="account-menu">
    <ul class="account-menu-ul menu-ul">
         <li class="account-menu-li ">
            <a href="/profile/orders/" class="account-menu-a menu-a">Заказы</a>
        </li>  
        <li class="account-menu-li ">
            <a href="/profile/favourites/" class="account-menu-a menu-a">Избранное</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/settings/" class="account-menu-a menu-a">Настройки аккаунта</a>
        </li>   
    </ul>
</div>

<div class="account-content">
    <p class="header-text">Настройки аккаунта</p>
    <div class="orders">
        <div class="account-info">
            <p>Имя:</p>
            <p>Имя</p>
            <!-- <button id="change-name" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div class="account-info">
            <p>Фамилия:</p>
            <p>Не указана</p>
            <!-- <button id="change-surname" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div class="account-info">
            <p>Email:</p>
            <p>OneClick@mail.ru</p>
            <!-- <button id="change-email" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div class="account-info">
            <p>Телефон:</p>
            <p>+7 777 000 00 00</p>
            <!-- <button id="change-phone" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div class="account-info">
            <p>Адрес доставки:</p>
            <p>Не указан</p>
            <!-- <button id="change-adress" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div class="account-info">
            <p>Пароль:</p>
            <p>*******</p>
            <!-- <button id="change-password" class="change" type="submit" value="Добавить в избранное">Изменить</button> -->
        </div>
        <div>
            <a href="">
                <button id="change-password" class="change" type="submit" value="Изменить">Изменить</button>
            </a>
        </div>



    
    </div>
    <!-- /.orders -->
</div>
<!-- /.account-content -->
</div>
<!-- /.account-view -->

<div id="modal-name" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить имя</button>
                <button class="close-name">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Введите новое имя:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Имя" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-dialogue -->
    </div>

    <div id="modal-surname" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить Фамилию</button>
                <button class="close-surname">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Введите новую фамилию:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Фамилия" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-dialogue -->
    </div>

    <div id="modal-email" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить Email</button>
                <button class="close-email">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Введите новый email:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Email" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>

        </div>

    </div>

    <div id="modal-phone" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить контактный номер телефона</button>
                <button class="close-phone">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Введите новый телефон:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Телефон" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>

        </div>

    </div>

    <div id="modal-adress" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить адресс доставки</button>
                <button class="close-adress">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <p class="login-name">Введите новый адрес:</p>
                    <div class="login-form">
                        <!-- <p class="login-name">Город:</p> -->
                        <form action="" method="get">
                            <input name="s" placeholder="Город" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <!-- <p class="login-name">Улица:</p> -->
                        <form action="" method="get">
                            <input name="s" placeholder="Улица" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <!-- <p class="login-name">Дом:</p> -->
                        <form action="" method="get">
                            <input name="s" placeholder="Дом" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <!-- <p class="login-name">Квартира:</p> -->
                        <form action="" method="get">
                            <input name="s" placeholder="Квартира" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>

        </div>

    </div>

    <div id="modal-password" class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title">Изменить пароль</button>
                <button class="close-password">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Введите старый пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Старый пароль" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Введите новый пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Новый пароль" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Повторите новый пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Повтор пароля" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Сохранить</button>
                        </div>
                    </div>
                </div> 
            </div>

        </div>

    </div>




    <script>
            const personName = document.querySelector("#change-name"); 
            const personSurname = document.querySelector("#change-surname"); 
            const personEmail = document.querySelector("#change-email"); 
            const personPhone = document.querySelector("#change-phone"); 
            const personAdress = document.querySelector("#change-adress"); 
            const personPassword = document.querySelector("#change-password"); 

            const changeName = document.querySelector("#modal-name"); 
            const changeSurname = document.querySelector("#modal-surname"); 
            const changeEmail = document.querySelector("#modal-email"); 
            const changePhone = document.querySelector("#modal-phone"); 
            const changeAdress = document.querySelector("#modal-adress"); 
            const changePassword = document.querySelector("#modal-password"); 
    
            const closeName = document.querySelector(".close-name");
            const closeSurname = document.querySelector(".close-surname");
            const closeEmail = document.querySelector(".close-email");
            const closePhone = document.querySelector(".close-phone");
            const closeAdress = document.querySelector(".close-adress");
            const closePassword = document.querySelector(".close-password");
    
            personName.addEventListener("click", function(event){
            changeName.classList.add('is-now-open');
            });
    
            closeName.addEventListener("click", function(event){
            changeName.classList.remove('is-now-open');
            });

            personSurname.addEventListener("click", function(event){
            changeSurname.classList.add('is-now-open');
            });
    
            closeSurname.addEventListener("click", function(event){
            changeSurname.classList.remove('is-now-open');
            });

            personEmail.addEventListener("click", function(event){
            changeEmail.classList.add('is-now-open');
            });
    
            closeEmail.addEventListener("click", function(event){
            changeEmail.classList.remove('is-now-open');
            });

            personPhone.addEventListener("click", function(event){
            changePhone.classList.add('is-now-open');
            });
    
            closePhone.addEventListener("click", function(event){
            changePhone.classList.remove('is-now-open');
            });

            personAdress.addEventListener("click", function(event){
            changeAdress.classList.add('is-now-open');
            });
    
            closeAdress.addEventListener("click", function(event){
            changeAdress.classList.remove('is-now-open');
            });

            personPassword.addEventListener("click", function(event){
            changePassword.classList.add('is-now-open');
            });
    
            closePassword.addEventListener("click", function(event){
            changePassword.classList.remove('is-now-open');
            });
    </script>