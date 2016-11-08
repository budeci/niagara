@extends('layout')

@section('content')
    <section class="advertising">
        <div class="container">
            {!! ($advertisement) ? $advertisement->opportunities : ''!!}
        </div>
    </section>
    <section class="advertising_last">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    {!! ($advertisement) ?  $advertisement->inside_club : '' !!}
                </div>
                <div class="col-md-6 col-sm-6">
                    {!! ($advertisement) ? $advertisement->sponsors : '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
