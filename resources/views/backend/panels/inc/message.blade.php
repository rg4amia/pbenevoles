@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
        {{ implode('', $errors->all('<div>:message</div>')) }}
    </div>
@endif
