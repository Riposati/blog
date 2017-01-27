
@if($errors->any())

    <ul class="alert">

        @foreach($errors->all() as $erro)

            <li>{{ $erro }}</li>

        @endforeach

    </ul>

@endif

<div class="form-group">

    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title',null,['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('content', 'Conteúdo:') !!}
    {!! Form::textarea('content',null,['class' => 'form-control']) !!}

</div>