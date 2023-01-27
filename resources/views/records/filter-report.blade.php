<table class="table" id="report-table">
    <thead>
        <tr>

            <th>Timestamp</th>
            <th>Tracking # </th>
            <th>From (Office)</th>
            <th>Document Title</th>
            <th>Email address</th>
            <th>Document Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $document)
        <tr>
            <td>{{ Carbon\Carbon::parse($document->created_at)->format('F d,Y H:ia')}}</td>
            <td>{{ $document->tracking_number }}</td>
            <td>{{ $document->from_office }}</td>
            <td>{{ $document->document_title }}</td>
            <td>{{ $document->email_address }}</td>
            <td>{{ $document->document_type }}</td>

        </tr>
        @endforeach

    </tbody>
</table>