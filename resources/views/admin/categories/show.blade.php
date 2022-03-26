@extends('admin.layouts.main')

@section('content')
    {{-- OVERVIEW --}}
    <div class="panel panel-headline">

        <div class="panel-heading">
            <h3 class="panel-title">View Question</h3>
            {{-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> --}}
        </div>

        <div class="panel-body">
            
            <div class="p-5">
                <h4><b>Question:</b></h4>                
            </div>
            <div class="p-5">
                {!! $question->question !!}                
            </div>
            
            <div class="p-5">
                <h4><b>Category:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->category->category }}       
            </div>
            
            <div class="p-5">
                <h4><b>Concept:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->concept->concept }}       
            </div>
            
            <div class="p-5">
                <h4><b>Sub Concept:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->sub_concept->sub_concept }}       
            </div>
            
            <div class="p-5">
                <h4><b>Question Type:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->question_type->type }}       
            </div>
            
            <div class="p-5">
                <h4><b>Answer Type:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->answer_type->type }}       
            </div>

            <div class="p-5">
                <h4><b>Medium:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->medium->medium }}       
            </div>

            <div class="p-5">
                <h4><b>Level:</b></h4>                
            </div>
            <div class="p-5">
                {{ $question->level->level }}       
            </div>

            <div class="p-5">
                <h4><b>Question File:</b></h4>                
            </div>
            <div class="p-5">
                @if($question->question_file != null)
                    <img src="{{ $question->question_file_path }}" height="100px" width="100px">
                @else
                    <div>No File</div>
                @endif  
            </div>

            <div class="form-group text-right">
                <a href="{{ url('admin/questions') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

    </div>
    {{-- END OVERVIEW --}}
@endsection