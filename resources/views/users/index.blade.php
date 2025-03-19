<x-layout>
    <section class="section-main section-users"> 
        <h1 class="h1">Список пользователей</h1>
        <div class="form-search">
            <form action="">
                <select name="" id="">
                    <option value="" disabled selected hidden>Выберите статус</option>
                    <option value="active">Активные</option>
                    <option value="inactive">Заблокированные</option>
                </select>
                <input type="text" placeholder="Найти">
                <button name="action" value="search">Найти</button>
                <button>Сброс</button>
            </form>
        </div>
        <ul class="users-list">
            <li>
                <div class="list-info">
                    <h2 class="list-name">Иванов Иван Иванович <span class="green">active</span></h2>
                    <ul class="list-info-body">
                        <li>
                            <div>Логин:</div>
                            <div>ad.product</div>
                        </li>
                        <li>
                            <div>Email:</div>
                            <div>mai.ru</div>
                        </li>
                    </ul>
                </div>
                <div class="list-action">
                    <form action="">
                        <button>Редатировать</button>
                    </form>
                    <form action="">
                        <button class="remove-but">Заблокировать</button>
                    </form>
                    <form action="">
                        <button class="success-but">Разблокировать</button>
                    </form>
                </div>
            </li>
            <li>
                <div class="list-info">
                    <h2 class="list-name">Иванов Иван Иванович <span class="red">inactive</span></h2>
                    <ul class="list-info-body">
                        <li>
                            <div>Логин:</div>
                            <div>ad.product</div>
                        </li>
                        <li>
                            <div>Email:</div>
                            <div>mai.ru</div>
                        </li>
                    </ul>
                </div>
                <div class="list-action">

                    <form action="">
                        <button>Редатировать</button>
                    </form>
                    <form action="">
                        <button class="remove-but">Заблокировать</button>
                    </form>
                    <form action="">
                        <button class="success-but">Разблокировать</button>
                    </form>
                </div>
            </li>
        </div>
    </section>
</x-layout>