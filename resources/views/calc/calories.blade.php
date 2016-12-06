@extends('layout')
@section('content')
    <section class="calcul_calories">
        <div class="container">
            <h3 class="title">{{$meta->getMeta('calories_title')}}</h3>
            <h4>{{$meta->getMeta('calories_subtitle')}}</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="calories-table static-text js-calories-table">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th class="cell-title">{{$meta->getMeta('calories_product')}}</th>
                                    <th class="cell-weight">{{$meta->getMeta('calories_weight')}}</th>
                                    <th class="cell-amount">{{$meta->getMeta('calories_calories')}}</th>
                                </tr>
                            </thead>
                            @foreach ($food as $item)
                                <tr>
                                    <td class="cell-title">{{$item->name}}</td>
                                    <td class="cell-weight">
                                        <span class="calories-table-weight">
                                            <label for="ct-{{$item->id}}">
                                                <input type="text" id="ct-{{$item->id}}" class="iText js-calories-table-weight-value" value="{{$item->weight}}" data-cal="{{$item->calories}}" maxlength="7">
                                                {{$meta->getMeta('calories_gram')}}
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
                                        <span class="calories-table-total">{{$meta->getMeta('calories_total_weight')}} –
                                            <span class="calories-table-total-w js-calories-table-total-w">{{$food->sum('weight')}} {{$meta->getMeta('calories_kg')}}</span> {{$meta->getMeta('calories_total_count_calories')}} –
                                            <span class="calories-table-total-c js-calories-table-total-c">{{$food->sum('calories')}}</span>
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>                     
                        </table>
                        <a href="{{ url()->previous() }}">{{$meta->getMeta('calorories_go_back')}}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="calories-calc">
                        <div class="calories-calc-title">
                            <h3>{{$meta->getMeta('calories_form_title')}}</h3>
                             <p>{{$meta->getMeta('calories_form_subtitle')}} <sup class="star">*</sup> </p>
                        </div>
                        <div class="weight-calc js-calories-calc">
                            <form action="#!" id="calories-form" novalidate="novalidate">
                                <div class="content">
                                    <div class="row gender sr">
                                        <div class="item active man" data-value="man">
                                            <span>{{$meta->getMeta('calories_men')}}</span>
                                        </div>
                                        <div class="item woman" data-value="woman">
                                            <span>{{$meta->getMeta('calories_women')}}</span>
                                        </div>
                                    </div>
                                    <div class="row data sr">
                                        <div class="item">
                                            <label for="c-age">{{$meta->getMeta('calories_age')}}</label>
                                            <input class="iText js-age" type="text" name="c-age" id="c-age">
                                        </div>
                                        <div class="item">
                                            <label for="c-growth">{{$meta->getMeta('calories_height')}}</label>
                                            <input class="iText js-growth" type="text" name="c-growth" id="c-growth">
                                        </div>
                                        <div class="item">
                                            <label for="c-weight">{{$meta->getMeta('calories_your_weight')}}</label>
                                            <input class="iText js-weight" type="text" name="c-weight" id="c-weight">
                                        </div>
                                    </div>
                                    <div class="row activity">
                                        <label for="c-activity">{{$meta->getMeta('calories_lifestyle')}}</label>
                                        <select name="c-activity" id="c-activity">
                                            <option selected="selected" value="1.2">{{$meta->getMeta('calories_select_value_1')}}</option>
                                            <option value="1.375">{{$meta->getMeta('calories_select_value_2')}}</option>
                                            <option value="1.55">{{$meta->getMeta('calories_select_value_3')}}</option>
                                            <option value="1.725">{{$meta->getMeta('calories_select_value_4')}}</option>
                                            <option value="1.9">{{$meta->getMeta('calories_select_value_5')}}</option>
                                        </select>
                                    </div>
                                    <div class="row phys sr">
                                        <div class="item infit active" data-value="0">
                                            <span>{{$meta->getMeta('calories_form')}}</span>
                                        </div>
                                        <div class="item slim" data-value="500">
                                            <span>{{$meta->getMeta('calories_form_lose_weight')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit">
                                    <span class="js-submit">{{$meta->getMeta('calories_form_submit')}}</span>
                                </div>
                            </form>
                            <div class="result js-result">
                                <span class="close js-close" title="{{$meta->getMeta('calories_form_close_result')}}"></span>
                                <h2 class="js-result-total" data-template="{{$meta->getMeta('calories_result_you_have')}} [resultCalories] {{$meta->getMeta('calories_result_calories')}}"></h2>
                                @foreach ($result_calories as $key => $item)
                                    <div class="variant active" data-var="{{$key}}">
                                        {!!$item->body!!}
                                    </div>
                                @endforeach
                                <div class="ok-close">
                                    <span class="pseudo js-close">{{$meta->getMeta('calories_all_ok')}}</span>
                                    <p class="hint">{{$meta->getMeta('calories_close_modal')}}</p>
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
    @include('calc.partials.js-calories')
@endsection