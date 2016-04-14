{{--Identificando os erros na tela--}}
@if (isset($errors))
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<H3>Cadastro de Usuário</H3>

{{ Form::open(array('route' => 'usuarios.store','method' => 'post')) }}

{{ Form::label('nome', 'Nome') }}
{{ Form::text('nome') }}

{{ Form::label('sobrenome', 'Sobrenome') }}
{{ Form::text('sobrenome') }}

{{ Form::label('email', 'Email') }}
{{ Form::email('email') }}

{{ Form::label('usuario', 'Usuário') }}
{{ Form::text('usuario') }}

{{ Form::label('senha', 'Senha') }}
{{ Form::password('senha') }}

{{ Form::label('senhaConf', 'Confirmar Senha') }}
{{ Form::password('senhaConf') }}

{{ Form::submit('Cadastrar') }}

{{ Form::close() }}

<?php
echo link_to_route('usuarios.index', $title = 'Voltar');
?>
