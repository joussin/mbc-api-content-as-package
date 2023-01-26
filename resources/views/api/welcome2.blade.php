


<table>
    <thead>
    <th>
        <td>field_1</td>
        <td>field_2</td>
        <td>field_3</td>
        <td>field_4</td>
        <td>field_5</td>
    </th>
    </thead>


    <tbody>

    @foreach($data['posts'] as $post)

    <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['body']}}</td>
        <td>{{$post['userId']}}</td>
        <td>{{$post['reactions']}}</td>

    </tr>

    @endforeach

    </tbody>




</table>
