@extends('layout')
@section('content')
    <section class="calcul_calories">
        <div class="container">
            <h3 class="title">КАЛЬКУЛЯТОР КАЛОРИЙНОСТИ ПРОДУКТОВ ОТ NIAGARA</h3>
            <h4>Укажите примерное количество выбранных продуктов, чтобы узнать общее количество калорий</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="calories-table static-text js-calories-table">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th class="cell-title">ПРОДУКТ</th>
                                    <th class="cell-weight">ВЕС В ГРАММАХ</th>
                                    <th class="cell-amount">КОЛИЧЕСТВО КАЛОРИЙ</th>
                                </tr>
                            </thead>
                            @foreach ($food as $item)
                                <tr>
                                    <td class="cell-title">{{$item->name}}</td>
                                    <td class="cell-weight">
                                        <span class="calories-table-weight">
                                            <label for="ct-{{$item->id}}">
                                                <input type="text" id="ct-{{$item->id}}" class="iText js-calories-table-weight-value" value="{{$item->weight}}" data-cal="{{$item->calories}}" maxlength="7">
                                                грамм
                                            </label>
                                        </span>
                                    </td>
                                    <td class="cell-amount">
                                        <span class="calories-table-amount js-calories-table-amount">{{$item->calories}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <span class="calories-table-total">Общий вес –
                                            <span class="calories-table-total-w js-calories-table-total-w">{{$food->sum('weight')}} КГ</span> и общее количество калорий –
                                            <span class="calories-table-total-c js-calories-table-total-c">{{$food->sum('calories')}}</span>
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>                     
                        </table>
                        <a href="{{ url()->previous() }}">Вернуться назад</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="calories-calc">
                        <div class="calories-calc-title">
                            <h3>Хотите узнать, много это или мало для вас?</h3>
                            <p>Укажите свои данные. <sup class="star">*</sup> Все поля обязательны для заполнения</p>
                        </div>
                        <div class="weight-calc js-calories-calc">
                            <form action="#!" id="calories-form" novalidate="novalidate">
                                <div class="content">
                                    <div class="row gender sr">
                                        <div class="item active man" data-value="man">
                                            <span>Вы мужчина?</span>
                                        </div>
                                        <div class="item woman" data-value="woman">
                                            <span>Вы женщина?</span>
                                        </div>
                                    </div>
                                    <div class="row data sr">
                                        <div class="item">
                                            <label for="c-age">Ваш возраст</label>
                                            <input class="iText js-age" type="text" name="c-age" id="c-age">
                                        </div>
                                        <div class="item">
                                            <label for="c-growth">Рост</label>
                                            <input class="iText js-growth" type="text" name="c-growth" id="c-growth">
                                        </div>
                                        <div class="item">
                                            <label for="c-weight">И вес</label>
                                            <input class="iText js-weight" type="text" name="c-weight" id="c-weight">
                                        </div>
                                    </div>
                                    <div class="row activity">
                                        <label for="c-activity">Физическая активность в течение дня</label>
                                        <select name="c-activity" id="c-activity">
                                            <option selected="selected" value="1.2">Веду сидячий образ жизни</option>
                                            <option value="1.375">Гуляю с собакой, хожу в магазин</option>
                                            <option value="1.55">Делаю зарядку, бегаю по утрам, плаваю в бассейне</option>
                                            <option value="1.725">Регулярно занимаюсь фитнесом</option>
                                            <option value="1.9">Я спортсмен</option>
                                        </select>
                                    </div>
                                    <div class="row phys sr">
                                        <div class="item infit active" data-value="0">
                                            <span>Вы хотите остаться в форме?</span>
                                        </div>
                                        <div class="item slim" data-value="500">
                                            <span>Или сбросить вес?</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <span class="js-submit">Рассчитать</span>
                                </div>
                            </form>
                            <div class="result js-result">
                                <span class="close js-close" title="Закрыть результат"></span>
                                <h2 class="js-result-total" data-template="Вы получили [resultCalories] калорий"></h2>
                                <div class="variant active" data-var="1">
                                    Вам в сутки нужно получить <span class="js-variant-calories"></span> калорий. Сейчас  Обратите внимание на сбалансированность питания: ведь для активной жизни вам нужны и углеводы, и жиры, и белки. Рассчитать идеальный рацион с учетом ваших привычек и предпочтений в питании поможет «Консультация по питанию»
                                </div>
                                <div class="variant" data-var="2">
                                    Вам в сутки нужно получить <span class="js-variant-calories"></span> калорий. Похоже, вам стоит несколько сократить свой рацион или же больше двигаться. Попробуйте заменить любимые блюда менее калорийными, например, из меню фитнес-кафе Fresh Fit. Или выбрать энергоемкие тренировки: <a href="/services/group/power/">сайкл, силовые тренировки</a>, <a href="/services/functional/">функциональный тренинг</a>, а также <a href="/services/workout-room/">специальные программы в тренажерном зале</a>
                                </div>
                                <div class="variant" data-var="3">
                                    Вам в сутки нужно получить <span class="js-variant-calories"></span> калорий. Сейчас вы получаете гораздо больше. Либо вам нужно серьезно пересмотреть свой рацион с помощью диетолога. Либо вы много и тяжело тренируетесь. В этом случае вам стоит обратить внимание на <a href="/services/fitnes-cafe/sportivnoe-pitanie/">спортивное питание</a> – вкусный способ поддержать организм во время серьёзных нагрузок.
                                </div>
                                <div class="variant" data-var="4">
                                    Вам в сутки нужно получить <span class="js-variant-calories"></span> калорий. Похоже, вы недоедаете. Если это ваш привычный режим, и вы прекрасно себя чувствуете, вы можете себя побаловать калорийными вкусностями. Если вы стремитесь таким образом сбросить вес, то вам стоит посоветоваться с диетологом и тренером: мышцам обязательно нужно топливо, чтобы сжигать жиры. А организм не должен переходить на экономный режим, иначе каждую калорию он будет стараться отложить впрок. Эффективный режим <a href="/services/personal-training/">персональных тренировок</a> и консультации по питанию помогут найти идеальный баланс.
                                </div>
                                <div class="ok-close">
                                    <span class="pseudo js-close">Все ясно!</span>
                                    <p class="hint">Закрыть окно</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
   {!!Html::style('/assets/plugins/dropkick/build/css/dropkick.css')!!}
@endsection

@section('js')
    {!!Html::script('/assets/plugins/jquery-validation/dist/jquery.validate.min.js')!!}
    {!!Html::script('/assets/plugins/dropkick/build/js/dropkick.min.js')!!}
    @include('calc.partials.js')
@endsection