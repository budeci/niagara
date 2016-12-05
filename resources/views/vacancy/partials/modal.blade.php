<!--Modal-->
<div class="modal fade modal_post" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content abonare_content">
            <h3>{{$meta->getMeta('vacancy_modal_title')}}</h3>
            <h4>{{$meta->getMeta('vacancy_modal_subtitle')}}</h4>
            <form>
                <label for="email">{{$meta->getMeta('form_email')}}</label>
                <input id="email" type="text" name="email">
                <input type="submit" value="{{$meta->getMeta('form_submit')}}">
            </form>
        </div>
    </div>
</div>