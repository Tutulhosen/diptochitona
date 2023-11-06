@extends('dashboard.layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table id="myTable"  class="display">
                <thead>
                    <tr>
                        <th>ক্র: নং</th>
                        <th>অফিসের নাম</th>
                        <th>বিভাগ</th>
                        <th>জেলা</th>
                        <th>উপজেলা</th>
                        <th>পরিদর্শক</th>
                        <th>তারিখ</th>
                        <th>সময়</th>
                        <th>প্রক্রিয়া</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($schedule_data as $schedule)
                        <tr>
                            @php 
                            $data_time=explode((' '),date('h:i A', strtotime($schedule->schedule_time )));
                            if($data_time[1] == 'PM'){
                                $modified_am_pm='বিকাল';
                            }
                            else
                            {
                                $modified_am_pm='সকাল';
                            }
                                
                            $time_value=$modified_am_pm.' '.en2bn($data_time[0]);
                            @endphp
                            <td>{{en2bn($loop->index+1)}}</td>
                            <td>{{$schedule->off_id}}</td>
                            <td>{{$schedule->div_id}}</td>
                            <td>{{$schedule->dis_id}}</td>
                            <td>{{$schedule->upa_id}}</td>
                            <td>{{en2bn($schedule->inspector_id)}}</td>
                            <td>{{en2bn($schedule->schedule_date)}}</td>
                            <td>{{$time_value}}</td>
                            <td>{{$schedule->inspector_id}}</td>
                        </tr>
                        @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


@section('scripts')
    <script>
        
        $(document).ready(function(){
            $('#myTable').DataTable({
                order: [[3, 'desc']],
            });

        });

        search

    </script>
@endsection