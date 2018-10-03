<?php
$your_token = '1231231235423';
$your_secret = 'adsasd123asdasd34112asdasd123';
$Freelancehunt = new Freelancehunt_API($your_token,$your_secret);
$userDataWithPortfolio = $Freelancehunt->getUserProfile( 'Ranivel', array( 'portfolio' ) );

Response:
{
    "avatar": "https://content.freelancehunt.com/profile/photo/50/Ranivel.png",
    "avatar_md": "https://content.freelancehunt.com/profile/photo/225/Ranivel.png",
    "city_name_ru": "Умань",
    "country_name_ru": "Украина",
    "creation_date": "2010-11-07T12:16:17+02:00",
    "fname": "Ольга",
    "is_birth_date_verified": "1",
    "is_email_verified": "1",
    "is_employer": false,
    "is_fname_verified": "1",
    "is_freelancer": true,
    "is_online": false,
    "is_plus_active": true,
    "is_phone_verified": "1",
    "is_wmid_verified": "0",
    "last_activity": "2014-12-23T17:56:45+02:00",
    "cv": "Моё резюме :)",
    "cv_html": "
Моё резюме :)

",
    "login": "Ranivel",
    "negative_reviews": "0",
    "positive_reviews": "72",
    "profile_id": "17040",
    "rating": "3001",
    "rating_position": "9",
    "rating_position_category": "4",
    "rating_position_category_alt": "2",
    "skill_name_alt": "Создание сайта под ключ",
    "skill_name": "Дизайн сайтов",
    "sname": "Олениченко",
    "snippets": [
        {
            "skill_id": "43",
            "skill_name": "Дизайн сайтов",
            "snippet": "https://content.freelancehunt.com/snippet/5ce42/92555/189321/v_kistochka_web_f.jpg",
            "snippet_addition_time": "2014-12-19 15:50:59",
            "snippet_comment": "Дизайн интернет магазина по продаже цифровых картин.",
            "snippet_content_type": "image/jpeg",
            "snippet_file_size": "404527",
            "snippet_filename": "v_kistochka_web_f.jpg",
            "snippet_name": "Весёлая кисточка",
            "snippet_thumbnail": "https://content.freelancehunt.com/snippet/thumbnail/225/5ce42/92555/189321/v_kistochka_web_f.jpg",
            "views": 21,
            "votes_up": 1
        },
        {
            "skill_id": "18",
            "skill_name": "Обработка фото",
            "snippet": "https://content.freelancehunt.com/snippet/826db/3a5f9/27009/planet2.jpg",
            "snippet_addition_time": "2011-03-07 23:39:10",
            "snippet_comment": "фотоэффекты",
            "snippet_content_type": "image/jpeg",
            "snippet_file_size": "403844",
            "snippet_filename": "planet2.jpg",
            "snippet_name": "1",
            "snippet_thumbnail": "https://content.freelancehunt.com/snippet/thumbnail/225/826db/3a5f9/27009/planet2.jpg",
            "views": 49,
            "votes_up": 4
        },
        {
            "skill_id": "43",
            "skill_name": "Дизайн сайтов",
            "snippet": "https://content.freelancehunt.com/snippet/0018b/55889/178694/r_h_web.jpg",
            "snippet_addition_time": "2014-11-12 16:37:04",
            "snippet_comment": "Дизайн сайта компании, которая производит удобрения для роста растений.",
            "snippet_content_type": "image/jpeg",
            "snippet_file_size": "911601",
            "snippet_filename": "r_h_web.jpg",
            "snippet_name": "Rosla - landscape and garden",
            "snippet_thumbnail": "https://content.freelancehunt.com/snippet/thumbnail/225/0018b/55889/178694/r_h_web.jpg",
            "views": 154,
            "votes_up": 8
        }
    ],
    "status_name": "Свободен для работы",
    "url": "https://freelancehunt.com/profile/show/Ranivel.html",
    "url_private_message": "https://freelancehunt.com/mailbox/sendmessage/attach/no/to/17040",
    "website": null
}
