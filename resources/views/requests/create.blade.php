<form action="{{ route('requests.store') }}" method="POST">
    <!-- CSRF token for security -->
    @csrf

    <h2>Create a New Transaction</h2>

    <label for="GST_number">GST number:</label>
    <select id="GST_number" name="GST_number" required>
      <option value="" disabled selected>Select a GST number</option>
      @foreach ($users as $user)
        <option value="{{ $user->GST_no }}" {{ $user->GST_no == old('GST_no') ? 'selected' : '' }}>
          {{ $user->GST_no }}
        </option>
      @endforeach
    </select>

    <label for="transactionType">Transaction Type</label>
    <select name="transactionType" id="transactionType">
  <option value="addition">addition</option>
  <option value="deduction">deduction</option>
    </select>

    <label for="hashTag">hashtag:</label>
    <input 
      type="text" 
      id="hashTag" 
      name="hashTag"
      required
    >
    <label for="points">points:</label>
    <input 
      type="number" 
      id="points" 
      name="points"
      required
    >
    

    <label for="date">date:</label>
    <input 
      type="date" 
      id="date" 
      name="date"
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