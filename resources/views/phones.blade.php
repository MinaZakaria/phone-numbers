<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phone numbers</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Phone numbers</h1>
        @php
        $oldCountryCode = \Request::get('countryCode');
        $oldState = \Request::get('valid');
        @endphp
        <form class="form-inline" method="GET">
            <select name='countryCode' class="form-control" style="width: 200px">
                <option value="">Select country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->getCountryCode() }}" {{$oldCountryCode == $country->getCountryCode() ? 'selected="selected"': ''}}>
                    {{ $country->value . ' ' . $country->getCountryCode()  }}
                </option>
                @endforeach
            </select>
            <select name='valid' class="form-control ml-3" style="width: 200px">
                <option value="">Valid phone numbers</option>
                <option value="true" {{$oldState == 'true' ? 'selected="selected"': ''}}>Valid</option>
                <option value="false" {{$oldState == 'false' ? 'selected="selected"': ''}}>Not valid</option>
            </select>
            <button type="submit" class="btn btn-primary ml-5">Filter</button>
        </form>

        <table class="table table-bordered mb-5">
            <thead>
                <th>Country</th>
                <th>State</th>
                <th>Country code</th>
                <th>Phone num.</th>
            </thead>
            <tbody>
                @if ($phones->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">No phones to display.</td>
                </tr>
                @endif

                @foreach ($phones as $phone)
                <tr>
                    <td>{{ $phone->getCountry()->value }}</td>
                    <td>{{ $phone->isValid() ? 'Ok' : 'NOk' }}</td>
                    <td>{{ $phone->getCountryCode() }}</td>
                    <td>{{ $phone->getLocalNumber() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>