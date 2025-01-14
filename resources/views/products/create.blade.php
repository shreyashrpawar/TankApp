<form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
    <!-- CSRF token for security -->
    @csrf

    <h2>Create a New Product</h2>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <label for="headText">headText:</label>
    <input 
      type="text" 
      id="headText" 
      name="headText"
      required
    >

    <label for="description">description:</label>
    <textarea 
      id="description" 
      name="description"
      required
    ></textarea>

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
  <h2>Currently Available Products</h2>

  <table>
    <thead>
      <th>Image</th>
      <th>Head Text</th>
      <th>description</th>
    </thead>
    <tbody>
    @foreach($products as $product)
            <tr>
            <td><img width="50" height="50" src='{{$product->image}}'/></td>
            <td>{{$product->headText}}</td>
            <td>{{$product->description}}</td>
           </tr>
    @endforeach
    </tbody>
  </table>