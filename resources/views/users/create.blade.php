<form action="{{ route('users.store') }}" method="POST">
    <!-- CSRF token for security -->
    @csrf

    <h2>Create a New User</h2>

    <label for="name">Name:</label>
    <input 
      type="text" 
      id="name" 
      name="name"
      required
    >

    <label for="email">email</label>
    <input 
      type="email" 
      id="email" 
      name="email"
      required
    >

    <label for="password">password:</label>
    <input 
      type="password" 
      id="password" 
      name="password"
      required
    >
    <label for="GST_no">GST number</label>
    <input 
      type="text" 
      id="GST_no" 
      name="GST_no"
      required
    >

    <button type="submit" class="btn mt-4">Create</button>

    <!-- validation errors -->
    @if ($errors->any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    
  </form>
  <h2>Currently Available Users</h2>

  <table>
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th>Gst number</th>
    </thead>
    <tbody>
    @foreach($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->GST_no}}</td>
           </tr>
    @endforeach
    </tbody>
  </table>