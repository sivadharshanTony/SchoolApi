<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .no-records {
            text-align: center;
            padding: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 200) {
                        var studentData = response.student;
                        if (studentData.length > 0) {
                            var tableBody = $('#student-table tbody');
                            $.each(studentData, function(index, student) {
                                var row = $('<tr>');
                                row.append($('<td>').text(student.id));
                                row.append($('<td>').text(student.name));
                                row.append($('<td>').text(student.age));
                                row.append($('<td>').text(student.grade));
                                tableBody.append(row);
                            });
                        } else {
                            $('#student-table tbody').append('<tr><td colspan="4" class="no-records">No records found</td></tr>');
                        }
                    } else {
                        console.log('Error: ' + response.status_message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        });
    </script>
</head>
<body>
    <h1>Student Records</h1>
    <table id="student-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</body>
</html>
