<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-6 offset-md-3 mt-5">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('QR') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select id="type" name="type" class="form-control">
                                    <option value="">Choose an option...</option>
                                    <option value="phone">Call to phone number</option>
                                    <option value="web">Web Page</option>
                                    <option value="sms">Send SMS</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Only for SMS/Phone number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text_message" class="col-sm-2 col-form-label">Text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text_message" name="text_message" placeholder="message/phone/web page">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Generate QR!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <hr />


            @if ( isset( $message ) and !empty($message) )
                <div class="visible-print text-center mt-5 pt-5">
                    {!!  $message !!}
w                </div>
            @endif

        </div>
    </body>
</html>
