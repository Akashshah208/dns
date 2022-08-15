<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>User Data List</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="text-align: center">
                No Data Found
            </td>
        </tr>
    @endforelse
</table>

</body>
</html>


