<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EPS Maintenance inspections')}} | Inspection </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body class="container" style="font-size: small">

<img class="mt-4 img-responsive right-block" style="height: 150px; width:150px" src="{{asset('images/EPS Inspect.jpg')}}" alt="EPS Logo">



<div>
    <h3 class="text-center"><strong>Electrical Power Solutions High Voltage Maintenance Inspection</strong></h3>
    <br>
    <h3 class="text-center">Introduction</h3>
    <hr>
    <p>Electrical Power Solutions maintenance protocol carried out in accordance with UK legislation and industry standard.
        The Health and Safety at Work Act 1974 (the HSW Act), the Management of Health and Safety at Work Regulations 1999 (the Management Regulations) and the Electricity at Work Regulations 1989 (EAWR) are applicable to the selection, use, operation and maintenance of high-voltage switchgear. The HSW Act also places duties on the manufacturers of switchgear.
        The use, maintenance and operation of high-voltage switchgear must be managed to prevent both the equipment giving rise to danger and to ensure the safety of the people who use it. Allowing equipment to become unsafe and, as a result, exposing people to danger during its use is likely to breach the law. Oil-filled switchgear presents particular issues not encountered with other types of equipment.
        Switchgear must only be operated by people who are competent to do so. People with the necessary competence to operate switchgear are often referred to as ‘authorised persons’. A system should be in place to assess and appoint the people who can operate switchgear (authorised persons), record who they are, what training they have received, what experience they have, what items of switchgear they are permitted to operate, and what duties they are authorised to undertake.</p>

    <h3 class="text-center">Site Details</h3>
    <hr>
    <p class="text-center">Company: {{$inspection->client->client}}</p>
    <p class="text-center">Location: {{$inspection->site}}</p>
    <p class="text-center">Job Number: {{$inspection->job_number}}</p>


    <h3 class="text-center">Engineer Details</h3>
    <hr>
    <p class="text-center">Name: {{$inspection->user->name}}</p>
    <p class="text-center">Position: Engineer</p>
    <p class="text-center">Date: {{$inspection->checked_on}}</p>
</div>

<div class="page-break"></div>

<h3>Checklist</h3>
<hr>
@foreach($sections as $section)
    @if(in_array($section->id, $included_sections))
        <h4><strong>{{$section->name}}</strong></h4>
        @foreach($answers as $answer)
            @if($answer->acceptable != "Do Not Include")
                @if($answer->question->section_id == $section->id)
                    <div class="ml-4 mr-4">
                        <div class="panel {{($answer->acceptable == "Acceptable")?'panel-success':'panel-warning'}}">
                            <div class="panel-heading">
                                <h5><strong>{{$answer->question->question}}</strong></h5>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td><strong>Check Outcome</strong></td>

                                        @if($answer->acceptable == "Acceptable")
                                            <td><strong class="text-success">Was found to be acceptable.</strong></td>
                                        @else
                                            <td class="text-danger"><strong>Was found to be unacceptable.</strong></td>
                                        @endif
                                    </tr>
                                    @if($answer->remedial_type != "No Action")
                                        <tr>
                                            @if($answer->remedial_type == "Recommended")
                                                <td><strong>Action: <span class="text-success">{{$answer->remedial_type}}</span></strong></td>

                                                <td class="text-success"><strong>{{$answer->remedial_comment}}</strong></td>
                                            @elseif($answer->remedial_type == "Monitor")
                                                <td><strong>Action: <span class="text-warning">{{$answer->remedial_type}}</span></strong></td>

                                                <td class="text-warning"><strong>{{$answer->remedial_comment}}</strong></td>
                                            @else
                                                <td><strong>Action: <span class="text-danger">{{$answer->remedial_type}}</span></strong></td>

                                                <td class="text-danger"><strong>{{$answer->remedial_comment}}</strong></td>
                                            @endif
                                        </tr>
                                    @endif
                                    @if($answer->comment != "")
                                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-bold text-gray-600">
                                                General Comments
                                            </dt>
                                            <dd class="mt-1 mb-2 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$answer->comment}}
                                            </dd>
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            @if($answer->pictures->count() > 0)
                                <div class="panel-footer">
                                    <h6><strong>Pictures</strong></h6>
                                    <table style="margin-bottom: 25px">
                                        <thead></thead>
                                        @foreach($answer->pictures as $picture)
                                            @if($loop->first || ($loop->iteration-1) % 3 == 0)
                                                <tr>
                                                    @endif
                                                    <td style="width: 30%">
                                                        <div style="text-align: center">
                                                            <img src="{{ Storage::disk('digitalocean')->url('thumb/'.$picture->filename)}}" alt="thumbnail">
                                                            <p>Comment</p>
                                                            @if($picture->comments)
                                                                <p>{{$picture->comments}}</p>
                                                            @else
                                                                <p>No comment entered.</p>
                                                            @endif
                                                        </div>

                                                    </td>
                                                    @if($loop->iteration % 3 == 0 || $loop->last)
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                        </div>
                        @if($answer->pictures->count() > 0)
                            <br>
                            <hr>
                        @endif
                    </div>
                @endif
            @endif
        @endforeach
    @endif
    @if(in_array($section->id, $included_sections))
        <hr style="border-color: red;">
    @endif
@endforeach

<div style="text-align: center">
    <p>
        All picture thumbnails can be viewed at full size at <i><strong>www.eps-inspect.epsconstruction.co.uk</strong></i>.
    </p>
</div>

</body>
