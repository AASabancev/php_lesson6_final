<div class="content-head__container">
    <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">{{ $data['page_title'] }}</div>
    </div>
    <div class="content-head__search-block">
        <div class="search-container">
            <form class="search-container__form" method="GET" action="/">
                <input name="search" type="text" value="{{ htmlspecialchars($data['search'] ?? null) }}" class="search-container__form__input">
                <button class="search-container__form__btn">Искать</button>
            </form>
        </div>
    </div>
</div>
