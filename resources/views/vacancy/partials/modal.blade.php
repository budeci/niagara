<!--Modal-->
<div class="modal fade modal_post" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content abonare_content">
            <h3>{{$meta->getMeta('vacancy_modal_title')}}</h3>
            <h4>{{$meta->getMeta('vacancy_modal_subtitle')}}</h4>
            <form method="post">
                <div class="form-group">
                    <label for="email">{!! $meta->getMeta('form_email') !!}</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
                    <input type="hidden" name="type" value="post">
                    {{csrf_field()}}
                    <span class="error" style="color: red; font-size: 12px;"></span>
                </div>
                <input class="subscribe" type="submit" value="{!! $meta->getMeta('form_submit') !!}" >
            </form>
        </div>
    </div>
</div>