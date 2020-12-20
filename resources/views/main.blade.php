@extends('app')

@section('content')
    <div class="text-center">
        <main class="col-12 p-0">
            <article class="main d-flex justify-content-between">
                <section class="feature d-flex flex-column align-items-center align-self-center">
                    <article id="a-1" class="elements">
                        <h2>
                            <a href="/hydraulics" class="button d-flex align-items-center">
                                ГИДРАВЛИКА
                            </a>
                        </h2>
                    </article>

                    <article id="a-2" class="elements">
                        <h2>
                            <a href="/geodesy" class="button d-flex align-items-center">
                                ГЕОДЕЗИЯ
                            </a>
                        </h2>
                    </article>

                    <article id="a-3" class="elements">
                        <h2>
                            <a href="/geology" class="button d-flex align-items-center">
                                ГЕОЛОГИЯ
                            </a>
                        </h2>
                    </article>
                </section>
                <section class="slider-3 d-flex justify-content-center align-items-center">
                    <slick-component></slick-component>
                </section>
            </article>
            <aside class="aside aside-1"></aside>
            <aside class="aside aside-2">
                <div class="AbUs">
                    <h1>Geo-Guide.ru</h1>
                    <div class="seo-text">
                        <p>Нужна контрольная, задача или дипломная работа? Мы готовы помочь и предоставить уже готовое решение. Наш ресурс выполняет работы студентам МИИГАиК, ДВГУПС, АлтГАУ, УрГУПС, ВГАСУ, ВГЛТА, ОГУ, НГАСУ (Сибстрин), ТОГУ, ИГАСА. За это время нами была сформирована большая база готовых работ по следующим дисциплинам:</p>
                        <ul>
                            <li>геодезия</li>
                            <li>фотограмметрия</li>
                            <li>картография</li>
                            <li>земельный кадастр</li>
                            <li>геология</li>
                            <li>гидравлика</li>
                        </ul>
                        <p>Просто воспользуйтесь поиском у нас на сайте и возможно ответ окажется на выходе поискового запроса. Если в нашей базе интересующая вас работа отсутствует, вы можете заказать её решение, связавшись с нами в <a href="https://vk.com/club83059811" target="_blank">социальной сети</a>{{--  или заполнив <a href="/contact-form.html">соответствующую форму</a> --}}.</p>
                    </div>
                </div>
            </aside>
        </main>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/js/slick.js" defer></script>
@endsection
