@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <h4>{{ env('APP_NAME') }}</h4>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-lg-8 col-8 offset-2">
                   
                    <div class="card finish_exam_result_show">
                        <div class="card-tools">
                            <div class="float-left">
                                <h2 class="m-4 text-center"> {{$exam->exam_subject ?? ''}}</h2>
                            </div>
                            <div class="float-right">
                                <h3 class="m-4" id="demo"></h3>
                              </div>
                        </div>
                     
                     
                       <div class="card-body card_exam_data option_all_question">
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
                               <div class="float-right">
                               
                                <div class="btn btn-success submit_next btn-sm" data-examid="{{$exam->id}}">Next</div>
                               </div>
                    
                       
                       </div>
                    
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
<script>
    // Set the date we're counting down to

          var timeObject = new Date();
          var minutes = "<?php echo $exam->exam_time; ?>";
          console.log(minutes)
          var countDownDate = timeObject.setTime(timeObject.getTime() + 1000*60*minutes);
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = hours + "h "
      + minutes + "m " + seconds + "s ";
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);


    $(document).on('click','.option_all_question',function(){
        // var examid = $(this).attr("data-examid");
        // var questionid = $(this).attr("data-questionid");
        var exam_id = $(".exam_id").val();
        var question_id = $(".question_id").val();
        var correctans = $(".correct_asnwer").val();
        var value =$('input:radio:checked').val();

       // console.log(exam_id,question_id,value,correctans);
        $.ajax({
                type: 'get',
                url: "{{route('examstudentattend')}}",
                dataType: 'HTML',
                data: {exam_id:exam_id,question_id:question_id,correctans:correctans,value:value},
                'global': false,
                 asyn:true,
                 success: function (data) {
             //  $('.modal_data').html(data);
                
                           
                console.log(data)
              },
                error: function (response) {
                            console.log(response);
                }
             });
    });

    $(document).on('click', '.submit_next', function() {
           
            var examid = $(this).attr("data-examid");
            console.log(examid);
            $.ajax({
                type: 'get',
                url: "{{ route('examnextquestion') }}",
                dataType: 'HTML',
                data: {
                    examid: examid
                },
                'global': false,
                asyn: true,
                success: function(data) {
                    $(".card_exam_data").html(data)
                    console.log(data)
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

   
    </script>
@endpush
