@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicione um novo Checkup</h1>
    <div>
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
    @endif
        <form method="post" action="{{ route('checkup.store') }}">
            @csrf

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Selecione um Paciente</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Selecionar...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_checkup">Data do Checkup:</label>
                <input type="date" class="form-control" name="data_checkup"/>
            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="text" class="form-control" name="peso"/>
            </div>

            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="text" class="form-control" name="altura"/>
            </div>

            <div class="form-group">
                <label for="art_pressao">Pressão Arterial:</label>
                <input type="text" class="form-control" name="art_pressao"/>
            </div>

            <div class="form-group">
                <label for="glicose">Nivel de Glicose:</label>
                <input type="text" class="form-control" name="glicose"/>
            </div>

            <div class="form-group">
                <label for="colesterol_ldl">Colesterol LDL:</label>
                <input type="text" class="form-control" name="colesterol_ldl"/>
            </div>

            <div class="form-group">
                <label for="colesterol_hdl">Colesterol HDL:</label>
                <input type="text" class="form-control" name="colesterol_hdl"/>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Observações:</span>
                </div>
                <textarea class="form-control" aria-label="observacoes"></textarea>
            </div>

            <button type="submit" class="btn btn-primary-outline">Adicionar Checkup</button>
        </form>
    </div>
    </div>
</div>
@endsection
