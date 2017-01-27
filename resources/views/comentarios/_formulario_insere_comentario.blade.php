@if($errors->any())

    <ul class="alert">

        @foreach($errors->all() as $erro)

            <li>{{ $erro }}</li>

        @endforeach

    </ul>

@endif

<div class="form-group">

    {!! Form::label('name', 'Nome do dono do comentário:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('email', 'Email do dono do comentário:') !!}
    {!! Form::text('email',null,['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('comment', 'Insira um comentário:') !!}
    {!! Form::textarea('comment',null,['class' => 'form-control']) !!}

</div>

