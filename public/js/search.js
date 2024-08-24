$(document).ready(function() {
    // Function to handle filtering and sorting of employee cards
    $('#search-input').on('keyup', function() {
        var value = $(this).val().toLowerCase(); // Get the search input value

        // Filter and collect matching employees
        var employees = $('#employee-list .col-md-6').filter(function() {
            var text = $(this).text().toLowerCase();
            return text.includes(value); // Filter based on input
        }).sort(function(a, b) {
            // Sorting by Name, Department, or Designation
            var nameA = $(a).find('.card-title').text().toLowerCase();
            var nameB = $(b).find('.card-title').text().toLowerCase();
            var deptA = $(a).find('.card-text').text().toLowerCase();
            var deptB = $(b).find('.card-text').text().toLowerCase();

            // Sort by name first, if they match, then by department or designation
            if (nameA < nameB) return -1;
            if (nameA > nameB) return 1;
            if (deptA < deptB) return -1;
            if (deptA > deptB) return 1;
            return 0;
        });

        // Hide all cards first and then show the filtered & sorted results
        $('#employee-list .col-md-6').hide();
        $('#employee-list').html(employees.show());
    });
});

