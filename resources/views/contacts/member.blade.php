@extends('layout')

@section('content')
    <section class="enter_club">
        <div class="container">
            <h3 class="title">Comanda un tur</h3>
            <div class="enter_club_block">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <div class="enter_block">
                            <form method="post" action="{{route('enter_club_send_form')}}">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name"> Nume</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="phone">Telefon</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="e-mail">E-mail</label>
                                        <input type="text"  class="form-control" id="e-mail" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-md-12 col-sm-12  enter_for_checkbox">
                                        <input type="checkbox" id="accord" name="check" required>
                                        <label for="accord">Eu sunt de acord cu verificarea datelor personale </label>
                                    </div>
                                    <input type="hidden" name="form" value="Devina Membru">
                                    {{csrf_field()}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="submit" value="Trimite">
                                    </div>
                                </div>
                            </form>
                            <div class="enter-club-form-validation">@include('partials.errors.list')</div>
                        </div>
                    </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="enter_contain">
                        <p>Приобретая клубную карту World Class, вы становитесь полноценным членом клуба, в полной мере пользуясь всеми его возможностями и привилегиями:</p>
                        <br>
                        <p>• Cвободное посещение тренажерного зала, бассейна, студии танцев, боевых искусств и йоги в рамках специально отобранных групповых программ;</p>
                        <br>
                        <p>• Участие в насыщенной спортивной и светской жизни World Class, тематических фитнес-турах, Outdoor-занятиях.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection