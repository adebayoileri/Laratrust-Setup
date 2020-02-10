<div class="col-md-4">
    <div class="card">
        <div class="card-header">Menu</div>
        <div class="card-body">
            <ul>
                <li>User Management </li>
            <ul>
            <li><a href="{{url('/fw/users')}}">View Users</a></li>
            <li><a href="{{url('/fw/users/customer')}}">View Customers</a></li>
            <li><a href="{{url('/fw/users/admin')}}">View Admins</a></li>
            <li><a href="">View employees</a></li>
                <li><a href="{{url('/fw/users/create')}}">Create User</a></li>
            </ul>
            </ul>
            <hr>
            <ul>
                <li>Role Management </li>
            <ul>
            <li><a href="{{url('/fw/roles')}}">View Roles</a></li>
                <li><a href="">View Permissions</a></li>
            <li><a href="{{url('/fw/roles/create')}}">Create Role</a></li>
            </ul>
            </ul>
        </div>
    </div>
</div>