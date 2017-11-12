{{--  Checar se está logado como USUÁRIO  --}}
@if(Auth::guard('web')->check()) 
    <p class="text-success">
        Você está logado como <strong>USUÁRIO</strong>
    </p>
@else
    <p class="text-danger">
        Você está deslogado como <strong>USUÁRIO</strong>
    </p>
@endif

{{--  Checar se está logado como ADMINISTRADOR  --}}
@if(Auth::guard('admin')->check()) 
    <p class="text-success">
        Você está logado como <strong>ADMINISTRADOR</strong>
    </p>
@else
    <p class="text-danger">
        Você está deslogado como <strong>ADMINISTRADOR</strong>
    </p>
@endif