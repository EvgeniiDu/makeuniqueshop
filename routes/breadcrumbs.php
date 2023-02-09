<?php
//Home
use App\Models\Category;

Breadcrumbs::for('home', function ($trail){
    $trail->push('Головна сторінка', route('home'));
});
//Home > register
Breadcrumbs::for('register', function ($trail){
    $trail->parent('home');
    $trail->push('Реєстрація');
});
//Home > login
Breadcrumbs::for('login', function ($trail){
    $trail->parent('home');
    $trail->push('Авторизація');
});
//Home > cart
Breadcrumbs::for('cart', function ($trail){
    $trail->parent('home');
    $trail->push('Кошик', route('product.cart'));
});
//Home > cart > checkout
Breadcrumbs::for('checkout', function ($trail){
    $trail->parent('cart');
    $trail->push('Замовлення');
});
//Home > cart > thankyou
Breadcrumbs::for('thankyou', function ($trail){
    $trail->parent('cart');
    $trail->push('Оформлено');
});
//Home > catalog
Breadcrumbs::for('catalog', function ($trail){
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});
//Home > catalog > category
Breadcrumbs::for('shop', function ($trail, $category){
    $trail->parent('catalog');
    $trail->push($category->title, route('shop', ['slug' => $category->slug]));
});
//Home > catalog > category > details
Breadcrumbs::for('product.details', function ($trail, $category, $product){
    $trail->parent('shop', $category);
    $trail->push($product->title);
});
//Home > catalog > wishlist
Breadcrumbs::for('product.wishlist', function ($trail){
    $trail->parent('catalog');
    $trail->push('Обрані товари');
});
//Home > search
Breadcrumbs::for('product.search', function ($trail){
    $trail->parent('home');
    $trail->push('Результат пошуку');
});
//Home > contact
Breadcrumbs::for('discounts', function ($trail){
    $trail->parent('home');
    $trail->push('Акції');
});
//Home > pay-and-shipping
Breadcrumbs::for('payshipping', function ($trail){
    $trail->parent('home');
    $trail->push('Оплата і доставка');
});
//Home > warranty-and-returns
Breadcrumbs::for('warrantyreturns', function ($trail){
    $trail->parent('home');
    $trail->push('Гарантія та повернення');
});
//Home > about
Breadcrumbs::for('about', function ($trail){
    $trail->parent('home');
    $trail->push('Про нас');
});
//Home > contact
Breadcrumbs::for('contact', function ($trail){
    $trail->parent('home');
    $trail->push('Контакти');
});
Breadcrumbs::for('hotsales', function ($trail){
    $trail->parent('home');
    $trail->push('Гарячі знижки');
});
Breadcrumbs::for('top', function ($trail){
    $trail->parent('home');
    $trail->push('Топ продажу');
});
Breadcrumbs::for('new', function ($trail){
    $trail->parent('home');
    $trail->push('Новинки');
});
Breadcrumbs::for('afterwarranty', function ($trail){
    $trail->parent('home');
    $trail->push('Гарантійне та післягарантійне обслуговування');
});
Breadcrumbs::for('loyaltyprogram', function ($trail){
    $trail->parent('home');
    $trail->push('Програма лояльності');
});
Breadcrumbs::for('architectdesigner', function ($trail){
    $trail->parent('home');
    $trail->push('Архітекторам та дизайнерам');
});
Breadcrumbs::for('vacancies', function ($trail){
    $trail->parent('home');
    $trail->push('Вакансії');
});
Breadcrumbs::for('certifiedgood', function ($trail){
    $trail->parent('home');
    $trail->push('Сертифіковані товари');
});
Breadcrumbs::for('manufecturer', function ($trail){
    $trail->parent('home');
    $trail->push('Виробники');
});
//User
Breadcrumbs::for('user.profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Персональні дані', route('user.profile'));
});
Breadcrumbs::for('user.myorders', function ($trail) {
    $trail->parent('user.profile');
    $trail->push('Ваші замовлення');
});
