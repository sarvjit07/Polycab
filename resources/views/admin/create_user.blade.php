<style>
  .form-container {
    max-width: 750px;
    margin: 75px auto;
    padding: 20px;
    background-color: #edf3f7;
    border-radius: 15px;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
  }

  .form-container h1 {
    text-align: center;
    color: #001f7f;
    margin-bottom: 30px;
    font-weight: bold;
  }
  
  .back-button {
    display: inline-block;
    margin-bottom: 40px;
    padding: 8px 12px;
    background-color: #000080;
    color: white;
    text-decoration: none;
    border-radius: 6px;
  }

  .back-button:hover {
    background-color: #001f7f;
  }

  .form-group {
    display: flex;
    gap: 50px;
    margin-bottom: 20px;
  }

  .form-group > div {
    flex: 1;
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
  }

  input,
  select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
  }

  .submit-button {
    display: block;
    margin: 30px auto 0;
    padding: 10px 25px;
    font-size: 16px;
    font-weight: bold;
    background-color: #000080;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
  }

  .submit-button:hover {
    background-color: #001f7f;
  }
</style>

<div class="form-container">
  <h1>Add New User</h1>
  <a href="{{ route('admin.user_manage') }}" class="back-button">
    &#8592;
  </a>
  <form method="POST" action="{{ route('admin.store_user') }}">
    @csrf
    <div class="form-group">
      <div>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required>
      </div>
    </div>
    <div class="form-group">
      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="role">Role</label>
        <select id="role" name="role" required>
          <option value="" disabled selected>Choose Role...</option>
          <option value="Admin">Admin</option>
          <option value="Project Manager">Project Manager</option>
          <option value="Site Engineer">Site Engineer</option>
          <option value="Surveyor">Surveyor</option>
          <option value="ROW Coordinator">ROW Coordinator</option>
          <option value="Quality Inspector">Quality Inspector</option>
          <option value="User">User</option>
          <option value="Viewer">Viewer</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
      </div>
    </div>
    <button type="submit" class="submit-button">Create User</button>
  </form>
</div>