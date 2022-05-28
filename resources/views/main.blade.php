@extends('welcome')

@section('content')
    <main>
        <section class="linking-section">
            <h3><span class="lightgreen">ПРИЕМ ЗАКАЗОВ СЕЗОНА «ВЕСНА-2022» ЗАКОНЧЕН, ЗАКАЗЫ БОЛЬШЕ НЕ ПРИНИМАЮТСЯ.</span>
                О ДАТЕ ОТКРЫТИЯ СЕЗОНА «ОСЕНЬ-2022» — МЫ СООБЩИМ ДОПОЛНИТЕЛЬНО.
                ХОРОШЕГО ВАМ УРОЖАЯ!</h3>
        </section>
        <div class="helper-section">
            <img width="100%" src="{{asset('images/pexels-tom-swinnen-574919 1.png')}}">
            <a href="#catalog" class="kt-btn">Перейти к каталогу</a>
        </div>
        <div class="about-us" id="about-us">
            <h1>О нас</h1>
        </div>
        <section class="about-us-info">
            <p>Компания ООО «Раздольное», основана 30.10.2002.
                Сад в ООО «Раздольное» занимает более 60-ти гектаров земли, здесь в
                прошлом году уже дали свой первый урожай и черешня, и яблони.
                Сегодня в саду растет 9 сортов яблонь, 3 сорта черешни и 1 сорт вишни.</p>
            <div class="stat-info">
                <div class="info-element">
                    <span class="big-info">114387</span><span class="small-info">место по выручке</span>
                </div>
                <div class="info-element">
                    <span class="big-info">3527</span><span class="small-info">место по выручке
в регионе Краснодарский край</span>
                </div>
                <div class="info-element">
                    <span class="big-info">4582</span><span class="small-info">место по выручке
в отрасли "Сельское хозяйство”</span>
                </div>
            </div>
        </section>
        <div class="about-us" id="news">
            <h1>Новости</h1>
        </div>
        <section class="news">
            @foreach(\App\Models\News::all() as $new)
                <div class="news-container">
                    <img src="{{$new->imageUrl}}">
                    <a data-toggle="modal" data-target="#newsModal_{{$new->id}}" class="link-news" href="javascript:void(0)">Подробнее</a>
                </div>
                <div class="modal fade" id="newsModal_{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="news-modal-form">
                                <div class="modal-header"><h3>{{$new->title}}</h3></div>
                                <div class="modal-body">
                                    <div class="news-text-block">
                                        <p id="news-text-field" class="news-text">
                                            {{$new->text}}
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <div class="about-us">
            <h1>Каталог</h1>
        </div>
        <section class="catalog" id="catalog">
{{--            вывожу в цикле категории--}}
            @foreach(\App\Models\Category::all() as $cat)
                <div class="catalog-items-container">
                    <h4 class="catalog-item-header">
                        {{$cat->name}}
                    </h4>
                    <div class="catalog-grid">
{{--                        вывожу в цикле продукты соотв. категории--}}
                        @foreach(\App\Models\Product::where('category',$cat->id)->get() as $product)
                            <div class="catalog-grid-item">
                                <h5 class="catalog-grid-item__header">
                                    {{$product->name}}
                                </h5>
                                <div class="catalog-image">
                                    <img width="277px" height="277px" src="{{asset($product->imageUrl)}}">
                                </div>
                                <div class="catalog-grid-item__buttons">
                                    <a class="link-catalog" data-product="{{$product->name}}" tabindex="0">Добавить в заявку</a>
                                    <a>{{$product->count > 0 ? "Есть в наличии" : "Нет в наличии"}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
                <a class="link-to-cart" href="/order" tabindex="0">Перейти к заявке</a>

            </div>
        </section>
        <div class="about-us">
            <h1>Наши партнеры</h1>
        </div>
        <section class="partners">
            <div class="partner">
                <img src="{{asset('images/metro.png')}}">
                <p>МЕТРО</p>
            </div>
            <div class="partner">
                <img src="{{asset('images/ashan.png')}}">
                <p>АШАН</p>
            </div>
        </section>
        <div class="about-us" id="contactss">
            <h1>Контактная информация</h1>
        </div>
        <section class="contacts-info">
            <div class="phone-mail">
                <p>Телефон: +7 (861) 42-72-500</p>
                <p>Почта: razdolnoe2011@mail.ru</p>
            </div>
            <div class="address">
                <p>Адрес: Краснодарский кр., Кореновский район, станица Платнировская, ул. Красная, д. 129</p>
            </div>
        </section>
    </main>
@endsection
