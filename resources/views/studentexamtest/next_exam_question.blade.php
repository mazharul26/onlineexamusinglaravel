<div class="float-right">
    <h1 class="">{{$tota_quest_done}}/{{$total_exam_question}}</h1>
</div>
@foreach($examquestions as $examquestion)
<h4 class="">{{$examquestion->question_name ?? ''}}</h4>

<div class="m-4">
    <div class="">
<input type="hidden" class="exam_id" value="{{$exam->id ?? ''}}">
<input type="hidden" class="question_id" value="{{$examquestion->id ?? ''}}">
<input type="hidden" class="correct_asnwer" value="{{$examquestion->correct_ans ?? ''}}">
     <input type="radio"    class=""  name="st_question_answer" value="{{$examquestion->option_1 ?? ''}}">
     <label for="">{{$examquestion->option_1 ?? ''}}</label>
     </div>
     <div class="">
         <input type="radio"   class="" name="st_question_answer" value="{{$examquestion->option_2 ?? ''}}">
         <label for="">{{$examquestion->option_2 ?? ''}}</label>
         </div>
         <div class="">
             <input type="radio"  class="" 
             name="st_question_answer" value="{{$examquestion->option_3 ?? ''}}">
             <label for="">{{$examquestion->option_3 ?? ''}}</label>
             </div>
             <div class="">
                 <input type="radio"  class="" name="st_question_answer" value="{{$examquestion->option_4 ?? ''}}">
                 <label for="">{{$examquestion->option_4 ?? ''}}</label>
                 </div>
                 @if(!empty($examquestion->option_others))
                 
                 <div class="">
                     <input type="radio"  class="" name="st_question_answer" value="{{$examquestion->option_others ?? ''}}">
                     <label for="">{{$examquestion->option_others ?? ''}}</label>
                 </div>
                 @endif
            </div>
         @endforeach
                 @if($total_question > 1)
                 <div class="float-right">
                               
                    <div class="btn btn-success  submit_next btn-sm" data-examid="{{$exam->id}}">Next</div>
                </div>
                @else
                <form action="{{route('examfinishquestionpost')}}" class="" method="POST">
                    @csrf
                    <div class="float-right">
                           <input type="hidden" class="" name="exam_id" value="{{$exam->id}}">    
                        <button type="submit" class="btn btn-success  btn-sm">Finish</button>
                    </div>
                </form>
             
                @endif