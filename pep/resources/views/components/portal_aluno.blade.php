<table class="table">
<tbody>
    <tr>
        <td><a href="{{ url('instrutor/lista') }}" class="btn btn-sm btn-primary">Adquirir Instrutor</a></td>
        <td></td>
        <td><a href="{{ url('/grupoMuscular') }}" class="btn btn-sm btn-primary">Gerenciar grupos musculares</a></td>
    </tr>
    <tr>
        <td><a href="{{ url('aluno/lista') }}" class="btn btn-sm btn-primary">Gerenciar Alunos</a></td>
        <td></td>
        <td><a href="{{ url('/exercicio') }}" class="btn btn-sm btn-primary">Gerenciar exercícios</a></td>
    </tr>
    <tr>
        <td><a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Portal Administrador</a></td>
        <td><a href="{{ url('instrutor/home') }}" class="btn btn-sm btn-primary">Portal Instrutor</a></td>
        <td><a href="{{ url('aluno/home') }}" class="btn btn-sm btn-primary">Portal Aluno</a></td>
    </tr>
    <tr>
        <td><a href="{{ url('/login') }}" class="btn btn-sm btn-primary">Logar Administrador</a></td>
        <td><a href="{{ url('/instrutor') }}" class="btn btn-sm btn-primary">Logar Instrutor</a></td>
        <td><a href="{{ url('/aluno') }}" class="btn btn-sm btn-primary">Logar Aluno</a></td>
    </tr>
</tbody>
</table>
{{--  <br><br>
<a href="admin/logout" class="btn btn-sm btn-primary">Deslogar Admin</a>
<a href="instrutor/logout" class="btn btn-sm btn-primary">Deslogar Instrutor</a>
<a href="users/logout" class="btn btn-sm btn-primary">Deslogar Aluno</a>  --}}