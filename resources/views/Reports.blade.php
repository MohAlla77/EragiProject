@extends('Master')
@section('title', 'Reports')
@section('content')
    <div class="card bg-light">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="clo-12">
                            <select id="invoiceTypeFilter" class="form-select text-center ms-auto">
                                <option disabled selected>تقرير</option>
                                @foreach ($display as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 text-center">
                            <label for="toDate" class="form-label">الي تاريخ</label>
                            <input type="date" class="form-control text-center" name="toDate" id="toDate" required>
                        </div>
                        <div class="col-md-6 text-center">
                            <label for="fromDate" class="form-label">من تاريخ</label>
                            <input type="date" class="form-control text-center" name="fromDate" id="fromDate" required>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto py-4">
                            <button class="btn btn-primary" type="submit">انشاء تقرير</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($Reports))
        <div class="card mb-4">
            <div class="card-header text-end">تقرير <i class="fas fa-table me-4"></i></div>
            <div class="card-body">
                <div class="row">
                    <form id="searchForm" action="#" method="GET">
                        <div class="input-group">
                            <input class="form-control text-center" placeholder="ابحث" required>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@stop
{{-- <script>
    // Function to fetch webpage content and display in table
    function displayWebpageContent(url) {
        $.get(url, function(data) {
            // Extract content from fetched HTML
            var content = $(data).find('body').html();
            
            // Update table with content
            $('#webpageTable tbody').html('<tr><td>' + content + '</td></tr>');
        });
    }

    // Event listener for dropdown change
    $('#pageSelect').change(function() {
        var selectedPage = $(this).val();
        displayWebpageContent(selectedPage);
    });

    // Display initial content on page load
    displayWebpageContent($('#pageSelect').val());
</script> --}}