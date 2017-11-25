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

{{--  Checar se está logado como INSTRUTOR  --}}
@if(Auth::guard('instrutor')->check()) 
    <p class="text-success">
        Você está logado como <strong>INSTRUTOR</strong>
    </p>
@else
    <p class="text-danger">
        Você está deslogado como <strong>INSTRUTOR</strong>
    </p>
@endif

{{--  Checar se está logado como ALUNO  --}}
@if(Auth::guard('web')->check()) 
    <p class="text-success">
        Você está logado como <strong>ALUNO</strong>
    </p>
@else
    <p class="text-danger">
        Você está deslogado como <strong>ALUNO</strong>
    </p>
@endif

