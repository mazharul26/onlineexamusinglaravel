@extends('layouts.master')

@push('css')
@endpush

@section('content')

    <section class="container">
        <div class="container-fluid">

            <br>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Exam Question Info List</h4>

                    <div class="card-tools">
                        <a class="btn btn-primary btn-xs" href="{{ route('examquestion.create') }}"> Create New  Exam Question Info</a> &nbsp;
                        <button class="btn btn-xs btn-info float-right"
                            onclick="exportTableToCSV('management.csv')">Export To CSV</button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-sm table-striped text-nowrap">
                            <tr>
                                <th>No</th>
                                 <th>Exam</th>
                                 <th>Question</th>
                                 <th>Option 1</th>
                                 <th>Option 2</th>
                                 <th>Option 3</th>
                                 <th>Option 4</th>
                                 <th>Option Other</th>
                                 <th>Correct Answer</th>
                                 <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                           
                            @forelse ($items as $key=> $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td >{{$item->exam->exam_subject ?? ''}}</td>
                                <td >{{$item->question_name ?? ''}}</td>
                                <td>{{ $item->option_1 ?? ''}}</td>
                                <td>{{ $item->option_2 ?? ''}}</td>
                                <td>{{ $item->option_3 ?? ''}}</td>
                                <td>{{ $item->option_4 ?? ''}}</td>
                                <td>{{ $item->option_others ?? ''}}</td>
                                <td>{{ $item->correct_ans ?? ''}}</td>
                                <td>
                                    @if($item->status==1)
                                    <p class="text-success">Active</p>
                                    @else
                                    <p class="text-danger">In-Active</p>
                                    @endif
                                </td>
                                <td>
                                
                                    <a class="btn btn-primary btn-xs"
                                        href="{{ route('examquestion.edit', $item->id) }}">Edit</a>
                                        <a  class=" btn btn-danger btn-xs" title="Delete" onclick="if(confirm('Are you sure to delete')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $item->id }}').submit();       
                                        }else {
                                            event.preventDefault();
                                        }"><i class="dw dw-delete-3"></i> Delete</a>  
                                         <form action="{{route('examquestion.destroy',$item->id)}}" id="delete-form-{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method("DELETE")
                                                            </form> 
                                                      </div>
                                                    </div>
                                </td>
                            </tr> 
                            @empty
                            <tr>
                                <td colspan="12" class="text-center text-danger"><h5>No data available in table.</h5></td>


                                
                               </tr>
                            @endforelse
                        
                        </table>



                    </div>

                   

                </div>
            </div>

        </div>
    </section>
@endsection

@push('js')
<script>
    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {
            type: "text/csv"
        });

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }

    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
                row.push("\"" + cols[j].innerText + "\"");

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
</script>
@endpush