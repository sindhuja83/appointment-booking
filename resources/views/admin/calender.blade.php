@role('Doctor')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctor's Dashboard</title>

        <!-- Include jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Include FullCalendar and Moment.js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

        <!-- Bootstrap CSS (if needed) -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @section('content')
        <div class="container mt-5">
        <p><h2  style="margin-left:200px"><b>Healthcare Provider's Appointments - Calendar</b></h2></p><br><br>
        <div class="panel panel-primary">
        <div class="panel-heading">
        <h3><b>Hello ! {{auth('web')->user()->user_name}}
        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-warning" style="margin-left:600px">Back</a>
        </b></h3>
        </div>
        <div class="panel-body">
        <div id="calendar"></div>
        </div>
        </div>
        </div>

    <script>
      $(document).ready(function() {
          var calendar = $('#calendar').fullCalendar({
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,basicWeek,basicDay'
              },
              navLinks: true,
              editable: true,
              events: "{{ route('getEvents') }}",
              displayEventTime: false,
              eventRender: function(event, element, view) {
                  if (event.allDay === 'true') {
                      event.allDay = true;
                  } else {
                      event.allDay = false;
                  }
              },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                var title = prompt('Event Title: ');
                  if (title) {
                var start = moment(start).format('YYYY-MM-DD');
                var end = moment(end).format('YYYY-MM-DD');
                  $.ajax({
                  url: "{{ route('createevent') }}",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    _token: '{{ csrf_token() }}'
                },
                  type: "POST",
                  success: function (data) {
                    alert("Added Successfully");
                    $('#calendar').fullCalendar('refetchEvents');
                 }
                });
                }
              },
              eventClick: function(event) {
                  var deleteMsg = confirm("Do you really want to delete?");
                  if (deleteMsg) {
                      $.ajax({
                          type: "post",
                          url: "{{ route('deleteevent') }}",
                          data: {
                              id: event.id,
                              _token: "{{ csrf_token() }}"
                          },
                          success: function(response) {
                              if (parseInt(response) > 0) {
                                  $('#calendar').fullCalendar('removeEvents', event.id);
                                  alert("Delete Successfully");
                              }
                          }
                      });
                  }
              }
          });
      });
  </script>
  
</body>
</html>

@endrole