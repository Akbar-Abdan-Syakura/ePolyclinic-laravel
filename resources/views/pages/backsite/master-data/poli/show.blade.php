<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($poli->name) ? $poli->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{ isset($poli->price) ? 'IDR '.number_format($poli->price) : 'N/A' }}</td>
    </tr>
</table>
