{{--<div class="row justify-content-md-center">
    @if(Session::has('orig_user'))
        <div class="alert alert-light logged-in-as">
            <span class="badge badge-primary">{{ ('You are currently logged in as') }} {{ Auth::user()->name }}.</span>
            <span class="badge badge-dark">Switched to</span><span class="badge badge-success"> <a
                    href="{{ route('users.logout-as') }}">{{ ('Re-Login as') }} {{ Session::get('orig_user')->name }}</a></span>
        </div>
    @endif
</div>--}}
<div class="demo-spacing-0">
    @if(session()->has('orig_user'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <div class="alert-body">
                {{ ('Vous êtes actuellement connecté en tant que ') }} {{ Auth::user()->first_name. ' ' . Auth::user()->last_name }}.
                <span class="badge badge-dark">Switched to</span><span class="badge badge-success">
                    <a href="{{ route('backend.reglages.users.logout-as') }}">{{ ('Se reconnecter en tant que ') }} {{ session()->get('orig_user')->first_name .' '. session()->get('orig_user')->last_name}}</a>
                </span>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
</div>
<br>
