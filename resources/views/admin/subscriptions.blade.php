<!DOCTYPE html>
<html>
<head>
    <title>Subscriptions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }
        .inline-elements {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .inline-elements h1 {
            margin: 0;
        }
        .inline-elements form,
        .inline-elements a {
            margin-left: 10px;
        }
        form button,
        a button {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover,
        a button:hover {
            background-color: #4cae4c;
        }
        table.dataTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table.dataTable th,
        table.dataTable td {
            padding: 10px;
            text-align: left;
        }
        table.dataTable th {
            background-color: #5cb85c;
            color: #ffffff;
        }
        table.dataTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table.dataTable tr:hover {
            background-color: #ddd;
        }
    </style>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="inline-elements">
    <h1>Subscriptions</h1>
    <div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <a href="{{ route('user') }}">
        <button type="button">Users > </button>
    </a>
</div>
<table id="subscriptions-table" class="display">
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
