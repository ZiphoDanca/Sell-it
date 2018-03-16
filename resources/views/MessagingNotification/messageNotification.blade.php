@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li class="active">Message Notification List</li>
        {{--<li class="active"><a>  </a></li>--}}
        {{--<li class="active"><a>Posts</a></li>--}}
    </ol>
    <h4 class="page-title"> Message Notification Listing</h4>

    <div class="row">
        <div class="col-md-12" >
            <div class="tab-pane" id="closure">
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    <div class="table-responsive">
                        <table class="table tile table-striped" id="messagesTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>SurName</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

    <script>
        jQuery(document).ready(function($){
            var $data = {!! $notifications !!};
            assignToEventsColumns($data);
            function assignToEventsColumns(data) {
                var table = $('#messagesTable').dataTable({
                    "dom": 'Bfrtip',
                    "scrollX": true,
                    "bAutoWidth": false,
                    "aaData": data,
                    "aaSorting": [],
                    "buttons": [
                        'copyHtml5',
                        'excelHtml5',
                        ,{
                            extend : 'pdfHtml5',
                            title  : 'Food_For_Us',
                            header : 'I am text in',
                        },
                    ],
                    "buttons": [
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],
                    "columns": [
                        {data: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'surname', name: 'surname'},
                        {data: 'message', name: 'message'},
                        {data: function(d)
                            {
                                return "<a href='{!! url('resendMessage/" + d.id +"') !!}'class='btn btn-sm'>" + 'Forward' + "</a>";
                            },"name" : 'name'},
                    ],
                    "aoColumnDefs": [
                        {
                            "aTargets": [0],
                            "bSearchable": false,
                            "bSortable": false,
                            "bSort": false,
                            "mData": "EventTypeId",
                        },
                        {
                            "aTargets": [1],
                            "mData": "EventType"
                        }
                    ]
                });
            }
        });
    </script>
@endsection