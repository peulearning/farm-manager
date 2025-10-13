{{-- @extends('welcome') <!-- ou o layout que você estiver usando --> --}}

@section('content')
<div class="container">
    <h1>Relatório de Animais Abatidos</h1>

    @if($animaisAbatidos->isEmpty())
        <p>Não há animais abatidos no momento.</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data de Nascimento</th>
                    <th>Peso (kg)</th>
                    <th>Leite</th>
                    <th>Ração</th>
                    <th>Data do Abate</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animaisAbatidos as $gado)
                <tr>
                    <td>{{ $gado->codigo }}</td>
                    <td>{{ $gado->data_nascimento }}</td>
                    <td>{{ $gado->peso }}</td>
                    <td>{{ $gado->leite }}</td>
                    <td>{{ $gado->racao }}</td>
                    <td>{{ $gado->data_abate }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
{{-- @endsection --}}
