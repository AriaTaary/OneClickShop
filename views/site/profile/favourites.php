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
                    <p class="header-text">Избранное</p>
                    
                    <div class="orders">

                        <!-- Избранная позиция -->

                        <div class="position">
                            <img class="basket-product-img" src="/img/logitech-g502-hero-3-1000x1000.jpg" alt="">
                            <p class="basket-product-name">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p>0 000 руб.</p> 
                            <div class="orders-buttons">
                                <button class="button-to-basket" type="submit">Добавить в корзину</button>
                                <button id="not-favorite" class="favorite" type="submit" value="Добавить в избранное">Добавить в избранное</button>
                                <button id="favorite" class="not-favorite is-open" type="submit" value="Удалить из избранного">Удалить из избранного</button>
                            </div>
                        </div>
                        <!-- /.position -->

                        <script>
                            const notFavorite = document.querySelector("#not-favorite");
                            const favorite = document.querySelector("#favorite");
                
                            notFavorite.addEventListener("click", function(event){
                                notFavorite.classList.remove('is-open');
                                favorite.classList.add('is-open');
                            });
                
                            favorite.addEventListener("click", function(event){
                                favorite.classList.remove('is-open');
                                notFavorite.classList.add('is-open');
                            });
                        </script>

                    </div>

                </div>
                <!-- /.account-content -->
            </div>
            <!-- /.account-view -->