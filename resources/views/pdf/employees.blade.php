<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Place</th>
        <th>Designation</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{$employee['id']}}</td>
        <td>{{$employee['name']}}</td>
        <td>{{$employee['place']}}</td>
        <td>{{$employee['designation']}}</td>
    </tr>
    @endforeach
</table>