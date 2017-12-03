<div align="center">
{{--  Checar se está logado como ADMINISTRADOR  --}}
@if(Auth::guard('web')->check()) 
    <p class="text-success">
    Olá, <strong>{{auth('web')->user()->name}} {{auth('web')->user()->lastname}}</strong>!
    Você está logado como <strong>ADMINISTRADOR</strong>
    </p>
{{--  @else
    <p class="text-danger">
        Você está deslogado como <strong>ADMINISTRADOR</strong>
    </p>  --}}
@endif

{{--  Checar se está logado como INSTRUTOR  --}}
@if(Auth::guard('instrutor')->check()) 
    <p class="text-success">
        Olá, <strong>{{auth('instrutor')->user()->name}} {{auth('instrutor')->user()->lastname}}</strong>!
        Você está logado como <strong>INSTRUTOR</strong>
    </p>
{{--  @else
    <p class="text-danger">
        Você está deslogado como <strong>INSTRUTOR</strong>
    </p>  --}}
@endif

{{--  Checar se está logado como ALUNO  --}}
@if(Auth::guard('aluno')->check()) 
    <p class="text-success">
        Olá, <strong>{{auth('aluno')->user()->name}} {{auth('aluno')->user()->lastname}}</strong>!
        Você está logado como <strong>ALUNO</strong>
    </p>
{{--  @else
    <p class="text-danger">
        Você está deslogado como <strong>ALUNO</strong>
    </p>  --}}
@endif
</div>