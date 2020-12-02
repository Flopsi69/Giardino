<div class="modal">
    <!-- Сallback -->
    <div class="modal__body m-callback" id='m-callback'>
        <div class="modal__close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" width="512" height="512">
                <path
                        d="M294.111 256.001L504.109 46.003c10.523-10.524 10.523-27.586 0-38.109-10.524-10.524-27.587-10.524-38.11 0L256 217.892 46.002 7.894C35.478-2.63 18.416-2.63 7.893 7.894s-10.524 27.586 0 38.109l209.998 209.998L7.893 465.999c-10.524 10.524-10.524 27.586 0 38.109 10.524 10.524 27.586 10.523 38.109 0L256 294.11l209.997 209.998c10.524 10.524 27.587 10.523 38.11 0 10.523-10.524 10.523-27.586 0-38.109L294.111 256.001z">
                </path>
            </svg>
        </div>

        <div class="modal__title text-center">Заказать звонок</div>
        <div class="modal__caption text-center">
            Оставьте ваш номер и мы перезвоним в ближайшее время
        </div>

        <form action='' class="m-callback__form">
            <div class="group">
                <label for="form_name" class="label">Имя</label>
                <input id='form_name' name='form_name' class='input w-100' type="text" placeholder='Ваше имя'>
            </div>
            <div class="group">
                <label for="form_phone" class="label">Телефон</label>
                <input id='form_phone' name='form_phone' class='input w-100' type="tel"
                       placeholder="+38 (096) 055-95-78">
            </div>
            <button type='submit' class='btn btn_red w-100 question__btn'>Перезвоните мне</button>
        </form>
    </div>
</div>