@extends('layouts.master')

@section('title')
    GPA Calculator
@endsection

@section('content')
    <p>Enter your grades to find out your GPA for this term!</p>

    <form method='GET' action='/calculate-gpa'>
        <div>* Required fields</div>

        @for($i = 1; $i <= 2; $i++)
            <label for='class{{ $i }}_grade'>* Class {{ $i }} </label>
            </br>
            <input type='text'
                   name='class{{ $i }}_grade'
                   id='class{{ $i }}_grade'
                   value='{{ old('class{!! $i !!}_grade') }}'>
            <select id='class{{ $i }}_type'>
                <option value='class-type' disabled selected>Class Type</option>
                <option value='regular'>Regular</option>
                <option value='honors'>Honors</option>
                <option value='ap'>AP</option>
            </select>
            </br>
            @include('modules.field-error', ['field' => 'class{!! $i !!}_grade'])
            @include('modules.field-error', ['field' => 'class{!! $i !!}_type'])
        @endfor
        @for($i = 3; $i <= 4; $i++)
            <label for='class{{ $i }}_grade'> Class {{ $i }} </label>
            </br>
            <input type='text'
                   name='class{{ $i }}_grade'
                   id='class{{ $i }}_grade'
                   value='{{ old('class{!! $i !!}_grade') }}'>
            <select>
                <option value='class-type' disabled selected>Class Type</option>
                <option value='regular'>Regular</option>
                <option value='honors'>Honors</option>
                <option value='ap'>AP</option>
            </select>
            </br>
        @endfor
        <input type='checkbox' name='weighted'>
        <label>Weighted</label>
        </br>
        <input type='submit' value='Calculate GPA!' class='btn btn-primary'>
    </form>

    @if(count($errors) > 0)
        <div class='alert alert-danger'>
            Please correct the errors above.
        </div>
    @endif
@endsection