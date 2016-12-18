@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul id="validation_errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
