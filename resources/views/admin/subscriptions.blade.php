<!DOCTYPE html>
<html>
<head>
    <title>Subscriptions</title>
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
    <h1>Subscriptions</h1>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <a href="{{ route('user') }}">
        <button type="button">Users</button>
    </a>
</div>
<table id="subscriptions-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Device UUID</th>
        <th>Device Name</th>
        <th>Product ID</th>
        <th>Receipt Token</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($subscriptions as $subscription)
        <tr>
            <td>{{ $subscription->id }}</td>
            <td>{{ $subscription->user->device_uuid }}</td>
            <td>{{ $subscription->user->device_name }}</td>
            <td>{{ $subscription->product_id }}</td>
            <td>{{ $subscription->receipt_token }}</td>
            <td>{{ $subscription->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#subscriptions-table').DataTable();
    });
</script>
</body>
</html>
