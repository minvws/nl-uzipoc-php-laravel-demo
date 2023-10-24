<form method="post" action="{{ route('ziekenboeg.logout') }}" class="inline">
    @csrf
    <button type="submit"><span class="icon	icon-user">@lang('User icon')</span>@lang('Logout')</button>
</form>
