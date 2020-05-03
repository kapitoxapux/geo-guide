<style>
    .modal-fade-enter,
    .modal-fade-leave-active {
        opacity: 0;
    }

    .modal-fade-enter-active,
    .modal-fade-leave-active {
        transition: opacity .5s ease
    }
    .modal_send_push {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .modal_send_push--back {
        background-color: rgba(0,0,0,.3);
        width: 100%;
        height: inherit;
        position: absolute;
    }
    .modal_send_push--content {
        min-width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: white;
        position: relative;
    }
    .modal_send_push .btn-secondary.company_input--label {
        background-color: transparent;
        border-color: #4e555b;
        color: #4e555b;
        cursor: pointer;
    }
    .modal_send_push .btn-secondary.company_input--label.active {
        background-color: #89beea;
        border-color: #89beea;
    }
    .body_approve label {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: space-between;
        justify-content: space-between;
    }
    .body_approve label input {
        max-width: 75%;
    }

</style>
<template>
    <div class="card-body">
        <section class="form_section">
            <div class="wufoo">
                <input id="push_notification_id" name="push_notification_id" type="hidden" :value="push_id" maxlength="255">
                <ul class="step_1">
                    <li class="foli">
                        <div>
                            <fieldset>
                                <legend class="desc notranslate">
                                    Тип уведомления
                                    <span class="req">*</span>
                                </legend>
                                <div>
                                    <select name="object_type" class="field select small" required v-model="message_type" @change="messageType">
                                        <option value="Канал">
                                            Отправка канала
                                        </option>
                                        <option value="Сайт">
                                            Отправка ссылки на сайт
                                        </option>
                                        <option value="Инфо">
                                            Отправка информационного сообщения
                                        </option>
                                        <option value="Фильм" selected>
                                            Отправка фильма
                                        </option>
                                        <option value="Пригласи друга">
                                            Пригласи друга
                                        </option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div v-if="genreShow">
                            <fieldset>
                                <legend class="desc notranslate">
                                    Целевая отправка
                                </legend>
                                <div>
                                    <div class="target_throw">
                                        <span class="subfield">
                                            <input class="checkbox" id="target_throw" type="checkbox" v-model="genres_send" true-value="with_genres" false-value="no_genres" @change="genresSend">
                                            <label class="choice" for="target_throw">
                                                <span class="choice__text">
                                                    По жанрам
                                                </span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="genre_block" v-if="genres_send==='with_genres'">
                                    <select id="object_genre" name="object_genre" class="field select small" required v-model="genre_to_send">
                                        <option v-for="(genre,i) in genres" :value="(genre['id']<4)?genre['id']+1:genre['id']">
                                            {{genre['title']}}
                                        </option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div>
                            <fieldset>
                                <legend class="desc notranslate">
                                    Время отправки
                                </legend>
                                <div>
                                    <div class="schedule_time">
                                        <span class="subfield">
                                            <input class="checkbox" id="the_moment" type="checkbox" v-model="time_to_send" true-value="Моментально" false-value="С задержкой" @change="scheduleTime">
                                            <label class="choice" for="the_moment">
                                                <span class="choice__text">Моментально</span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div v-if="time_to_send==='С задержкой'">
                                    <input class="range" id="range" type="datetime-local" value="" v-model="schedule_time">
                                </div>
                            </fieldset>
                        </div>
                    </li>
                    <li class="foli">
                        <fieldset>
                            <legend class="desc notranslate">
                                Платформа
                            </legend>
                            <div id="platforma">
                                <span class="subfield">
                                    <input id="android" name="android" type="checkbox" class="field checkbox" value="Android" v-model="checked_device">
                                    <label class="choice" for="android">
                                        <span class="choice__text android">Mobile</span>
                                    </label>
                                </span>
                                <span class="subfield" v-if="message_type!=='account'">
                                    <input id="iphone" name="iphone" type="checkbox" class="field checkbox" value="iOS" v-model="checked_device">
                                    <label class="choice" for="iphone">
                                        <span class="choice__text iOS">iOS</span>
                                    </label>
                                </span>
                                <span class="subfield" v-if="message_type!=='account'">
                                    <input id="contractless" name="contractless" type="checkbox" class="field checkbox" value="Без контракта" v-model="checked_device">
                                    <label class="choice" for="contractless">
                                        <span class="choice__text">Без контракта</span>
                                    </label>
                                </span>
                            </div>
                        </fieldset>
                    </li>
                    <li class="foli">
                        <div class="column_vert_block">
                            <div>
                                <fieldset>
                                    <legend class="desc">
                                        Заголовок
                                    </legend>
                                    <div>
                                        <input name="object_title" type="text" class="field text medium" value="" maxlength="50" v-model="title">
                                    </div>
                                </fieldset>
                            </div>
                            <div v-if="message_type==='Фильм'||message_type==='Канал'">
                                <fieldset>
                                    <legend class="desc">
                                        ID объекта
                                        <span class="req">*</span>
                                    </legend>
                                    <div>
                                        <input name="object_id" type="number" class="field text small" value="" maxlength="50" required v-model="object_id" @change="getBanner">
                                    </div>
                                    <p class="instruct">
                                        <small>(НОЛЬ НЕ СТАВИТЬ!)</small>
                                    </p>
                                </fieldset>
                            </div>
                        </div>
                    </li>
                    <li class="foli" v-if="message_type!=='Пригласи друга'">
                        <div class="column_vert_block">
                            <div>
                                <fieldset>
                                    <legend class="desc notranslate">
                                        Вид баннера
                                    </legend>
                                    <div>
                                        <select name="banner_type" class="field select small" required v-model="banner_type" @change="bannerType">
                                            <option value="promo_bann">
                                                Промо баннер
                                            </option>
                                            <option value="prem_bann">
                                                Премьера баннер
                                            </option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div>
                                <fieldset id="title_links" >
                                    <legend class="desc notranslate">
                                        Ссылки
                                    </legend>
                                    <div>
                                        <div>
                                            <label class="desc">
                                                Image URL
                                            </label>
                                            <input name="image_url" type="text" class="field text small" maxlength="255" v-model="image_url">
                                        </div>
                                        <div v-if="message_type==='Сайт'">
                                            <label class="desc">
                                                Page URL
                                                <span class="req">*</span>
                                            </label>
                                            <input name="url" type="url" class="field text small" value="" maxlength="255" required v-model="url">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="step_2">
                    <li class="foli">
                        <label class="desc">
                            Сообщение
                            <span class="req">*</span>
                        </label>
                        <div>
                            <textarea name="body_message" class="field textarea small" spellcheck="true" rows="2" cols="1" required v-model="body_message"></textarea>
                        </div>
                    </li>
                </ul>
                <ul class="step_3">
                    <li class="foli col-4">
                        <fieldset id="title_time" >
                            <legend class="desc notranslate">
                                Срок действия
                            </legend>
                            <div>
                                <div class="hours">
                                    <input name="expire_date" type="datetime-local" class="field text" value="" v-model="expire_date">
                                </div>
                            </div>
                        </fieldset>
                    </li>
                </ul>
                <div class="nav_bar float-right">
                    <div>
                        <button class="mat-button-wrapper send open click" type="button" @click="approveSend">Отправить</button>
                    </div>
                </div>
            </div>
        </section>
        <transition name="modal-fade" appear v-if="showModal">
            <div class="modal_send_push">
                <div class="modal_send_push--back"></div>
                <div class="modal_send_push--content">
                    <div class="modal-header">
                        <h4 class="modal-title">Вы уверены в отправке?</h4>
                        <button type="button" class="close" @click="rejectSend">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-left">Будет отправлен Push с такими параметрами:</p>
                        <div class="d-flex flex-column body_approve">
                            <label class="form-group">
                                Тип уведомления <input class="form-control" type="text" name="" :value="this.message_type" readonly>
                            </label>
                            <label class="form-group">
                                Заголовок <input class="form-control" type="text" name="" :value="this.title" readonly>
                            </label>
                            <label class="form-group">
                                Тело сообщения <input class="form-control" type="text" name="" :value="this.body_message" readonly>
                            </label>
                            <label class="form-group">
                                Платформы <input class="form-control" type="text" name="" :value="this.checked_device" readonly>
                            </label>
                            <label class="form-group">
                                Время отправки <input class="form-control" type="text" name="" :value="this.time_to_send" readonly>
                            </label>
                        </div>
                        <div class="modal-footer" style="border-top: none">
                            <button type="button" class="btn btn-success" @click="rejectSend">Отмена</button>
                            <button type="button" class="btn btn-success" @click="submitForm">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                'message_type': 'Фильм',
                'time_to_send': 'Моментально',
                'schedule_time': null,
                'genres_send': 'no_genres',
                'genre_to_send': null,
                'banner_type': 'promo_bann',
                'title': null,
                'body_message': null,
                'object_id': null,
                'checked_device': [],
                'image_url': null,
                'url': null,
                'expire_date': null,
                'showModal': false,
                'genreShow': false
            }
        },
        props: [
            'push_id',
            'genres'
        ],
        mounted() {
            this.update();
        },
        methods: {
            update: function(){
                console.log('PushComponent mounted!');
            },
            bannerType: function() {
                this.getBanner();
            },
            messageType: function() {
                this.clearAll();

                if(this.message_type==='account')
                {
                    this.title="Запрошуй друга - отримуй 25грн!";
                    this.body_message="Подаруй другу 7 днів безкоштовно і отримай бонус! Більше друзів — більше бонусів!";
                }
                else {
                    this.title='';
                    this.body_message='';
                }
            },
            scheduleTime: function() {
                if(this.time_to_send==='now') this.schedule_time='';
            },
            getBanner: function() {
                let type='';
                if(this.banner_type==='promo_bann') type='1';
                else type='3';

                this.$root.$options.methods.postRequest('/cors.php',{'id': this.object_id,'type': type})
                    .then((response) =>
                        {
                            if(response.status==='OK') return response.body;
                        }
                    )
                    .then((myJson) =>
                        {
                            if(myJson.exception==='ErrorException') this.image_url="Баннер для фильма отсутствует!";
                            else this.image_url='https://static.sweet.tv/images/banners/promotion/'+myJson+'.png';
                        }
                    );
            },
            genresSend: function(event) {
                console.dir(event);
            },
            clearAll: function () {
                this.object_id=null;
                this.image_url=null;

            },
            iosOfferCheck: function(id) {
                let _id=id,
                    counter=0,
                    apple_allow=false;

                return new Promise(
                    (resolve,reject) => {
                        try {
                            fetch('http://movie.trinity-tv.net/offers',{
                                headers: {
                                    "Accept":"Application/json"
                                }
                            })
                                .then((response)=>{
                                    if(!response.ok) throw Error(response.statusText);
                                    return response;
                                })
                                .then((response) =>
                                    {
                                        return response.json();
                                    }
                                )
                                .then((buffer) =>
                                    {
                                        buffer.forEach(function(el)
                                        {
                                            if(Number(el.movie_id)===Number(_id)) counter++;
                                        });
                                        if(counter===0) apple_allow=true;
                                        else {
                                            buffer.forEach(function(el)
                                            {
                                                if(Number(el.movie_id)===Number(_id))
                                                {
                                                    //&&el.stores[1].offer_store.status===3) apple_allow=true;
                                                    el.stores.forEach(function(it){
                                                        if(it.title==="AppStore"&&it.offer_store.status===3) apple_allow=true;
                                                    });
                                                }
                                            });
                                        }
                                        if(apple_allow)
                                        {
                                            resolve({
                                                    status: 'OK'
                                                }
                                            )
                                        }
                                        else this.handleErrors('Проверка AppStore не пройдена!');
                                        /*reject({
                                                status: 'Failed',
                                                message: 'Проверка AppStore не пройдена! Пуш не был отправлен.'
                                            }
                                        )*/
                                    }
                                );
                        }
                        catch(error)
                        {
                            this.handleErrors(error);
                        }
                    }
                )
            },
            handleErrors: function(message) {
                alert(message);
            },
            approveSend: function () {
                if(this.message_type==='Фильм')
                {
                    if(this.object_id===null) this.handleErrors('Не указан ID!');
                    else {
                        if(this.checked_device.includes('iOS'))
                        {
                            this.iosOfferCheck(this.object_id)
                                .then((response)=>{
                                    if(response.status==='OK') this.showModal=true;
                                });
                        }
                        else this.showModal=true;
                    }
                } else this.showModal=true;
            },
            rejectSend: function () {
                this.showModal=false;
            },
            submitForm: function () {
                let data={
                    'push_id': this.push_id,
                    'banner_type': this.banner_type,
                    'body_message': this.body_message,
                    'checked_device': this.checked_device,
                    'expire_date': this.expire_date,
                    'genre_to_send': this.genre_to_send,
                    'image_url': this.image_url,
                    'message_type': this.message_type,
                    'object_id': this.object_id,
                    'schedule_time': this.schedule_time,
                    'time_to_send': this.time_to_send,
                    'title': this.title,
                    'url': this.url
                };
                this.$root.$options.methods.postRequest('/push/new_send_raw_message',data)
                    .then((response) =>
                        {
                            if(response.status==='OK') return response.body;
                        }
                    )
                    .then((myJson) =>
                        {
                            this.handleErrors(myJson);
                            this.showModal=false;
                        }
                    );
            }
        }
    }
</script>