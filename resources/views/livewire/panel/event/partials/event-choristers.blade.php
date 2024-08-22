<div class="space-y-4">
    <div class="table-wrapper">
        <div class="table-header">
            <h3>Respostas</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="1">Resposta</th>
                    <th width="1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withAnswer as $chorister)
                    <tr>
                        <td>{{ $chorister->name }}</td>
                        <td>{{ $chorister->events->first()->pivot->answer }}</td>
                        <td>BOTÕES</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-wrapper">
        <div class="table-header">
            <h3>Coralistas sem resposta</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withoutAnswer as $chorister)
                    <tr>
                        <td>{{ $chorister->name }}</td>
                        <td>AÇÃO</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
