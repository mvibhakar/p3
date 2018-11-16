@extends('layouts.master')

@section('title')
    GPA Calculator
@endsection

@section('content')
    <h6>Enter your grades to find out your GPA for this term!</h6>


    <form method='GET' action='/calculate-gpa'>
        <h6>* Required fields</h6>

        @for($i = 1; $i <= 4; $i++)
            <div class='form-group'>
                <input type='text'
                       name='class{{ $i }}-grade'
                       id='class{{ $i }}-grade'
                       value='{{ old('class'.$i.'-grade') }}'
                       class="form-control col-12 input"
                       placeholder='Class {{ $i }} Grade'>
                <select name='class{{ $i }}-type'
                        id='class{{ $i }}-type'
                        value='{{ old('class'.$i.'-type') }}'
                        class="form-control col-12">
                    <option value='class-type' disabled selected>* Class Type</option>
                    <option value='regular'>Regular</option>
                    <option value='honors'>Honors</option>
                    <option value='ap'>AP</option>
                </select>

            </div>
        @endfor

        <div id='form-end'>
            <input type='checkbox' name='weighted'>
            <label>Weighted</label>
            </br>
            <input type='submit' value='Calculate GPA!' class='btn btn-primary'>
        </div>
    </form>

    @if(count($errors) > 0)
        <div class='alert alert-danger'>
            </br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($finalGPA)
        <h2>Your GPA is: <em>{{ $finalGPA }}</em>.</h2>
    @endif
@endsection