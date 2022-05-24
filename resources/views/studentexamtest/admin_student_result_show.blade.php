@extends('layouts.master')

@push('css')
@endpush

@section('content')

    <section class="container">
        <div class="container-fluid">

            <br>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Exam Result Info List</h4>

                    <div class="card-tools">
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
                                 <th>My Name</th>
                                 <th>Exam Attend Date</th>
                                 <th>My Score</th>
                                 <th>Total Score</th>
                           
                            </tr>
                           
                            @forelse ($items as $key=> $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td >{{$item->exam->exam_subject ?? ''}}</td>
                                <td >{{$item->user->name ?? ''}}</td>
                                <td>{{ $item->exam_attend_date ?? ''}}</td>
                                <td>{{ $item->st_total_score ?? ''}}</td>
                                <td>{{ $item->total_score ?? ''}}</td>
                         
                                
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