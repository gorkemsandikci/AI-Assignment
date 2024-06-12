<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <style>
        .inline-elements {
            display: flex;
            align-items: center;
        }
        .inline-elements form,
        .inline-elements button {
            margin-right: 10px;
        }
    </style>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="inline-elements">
    <h1>Users</h1>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <a href="{{ route('subscription') }}">
        <button type="button">Subscriptions</button>
    </a>
</div>
<table id="users-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Device UUID</th>
        <th>Device Name</th>
        <th>Premium Status</th>
        <th>Chat Credits</th>
        <th>Created At</th>
        <th>Last Update</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->device_uuid }}</td>
            <td>{{ $user->device_name }}</td>
            <td>{{ $user->is_premium === 1 ? 'true' : 'false' }}</td>
            <td>{{ $user->chat_credits }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable();
    });
</script>
</body>
</html>
