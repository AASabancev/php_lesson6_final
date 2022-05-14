<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        if (Setting::query()->count() != 0) {
            return;
        }

        $faker = \Faker\Factory::create();


        $settings = [
            [
                'title' => 'Описание о компании',
                'key' => 'about_company',
                'value' => '<img src="/img/cover/game-3.jpg" alt="Image" class="alignleft img-news">'
                    . '<p>' . $faker->text() . '</p>',
            ],
            [
                'title' => 'Текст в футере',
                'key' => 'footer_text',
                'value' => 'Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это онлайн-магазин игр для геймеров,
                существующий на рынке уже 5 лет. У нас широкий спектр лицензионных игр на компьютер, ключей для игр -
                для активации и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.), коды
                продления и многое друго. Также здесь всегда можно узнать последние новости из области онлайн-игр для
                PC. На сайте предоставлены самые востребованные и актуальные товары MMORPG, приобретение которых здесь
                максимально удобно и, что немаловажно, выгодно!',
            ],
            [
                'title' => 'Email получатель новых заказов',
                'key' => 'orders_email',
                'value' => '',
            ],
            [
                'title' => 'Заголовок перед слайдером',
                'key' => 'slider_text',
                'value' => 'Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam
                игры после оплаты',
            ],
            [
                'title' => 'Телефон на сайте',
                'key' => 'site_phone',
                'value' => '44-454-66',
            ],
            [
                'title' => 'URL Facebook',
                'key' => 'site_facebook',
                'value' => 'https://facebook.com/',
            ],
            [
                'title' => 'URL Twitter',
                'key' => 'site_twitter',
                'value' => 'https://twitter.com/',
            ],
            [
                'title' => 'URL Instagram',
                'key' => 'site_instagram',
                'value' => 'https://instagram.com/',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::query()->create($setting);
        }
    }
}
