<table class="table">
<tbody>
    <tr>
        <td><a href="{{ url('aluno')}}{{'/' . Auth::user()->id . '/addinstrutor' }}" class="btn btn-sm btn-primary">Selecionar Instrutor</a></td>
        <td></td>
        <td><a href="{{ url('/grupoMuscular') }}" class="btn btn-sm btn-primary">Gerenciar grupos musculares</a></td>
    </tr>
</tbody>
</table>