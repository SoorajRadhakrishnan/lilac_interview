<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h5 class="mb-4">Search</h5>
        <div class="search-bar mb-4">
            <input type="text" id="search-input" placeholder="Search name/designation/department" class="form-control">
        </div>

        <div class="row" id="employee-list">
            <!-- Search results will be injected here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    method: 'GET',
                    data: { query: query },
                    dataType: 'json',
                    success: function(data) {
                        $('#employee-list').html(data.card_data);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                    }
                });
            });
        });
    </script>
</body>
</html>
