  <a href="{{ route('requests.form') }}">Create</a>
  
  <h2>Currently Available Ninjas</h2>

  <table>
    <thead>
      <th>GST no.</th>
      <th>Transaction type</th>
      <th>hashTag</th>
      <th>points</th>
      <th>date</th>
    </thead>
    <tbody>
    @foreach($request as $requests)
            <tr>
            <td>{{$requests->GST_number}}</td>
            <td>{{$requests->transactionType}}</td>
            <td>{{$requests->hashTag}}</td>
            <td>{{$requests->points}}</td>
            <td>{{$requests->date}}</td>
           </tr>
    @endforeach
    </tbody>
  </table>