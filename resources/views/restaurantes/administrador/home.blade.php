@extends('template.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    <aside class="menu">
                        <p class="menu-label">
                          General
                        </p>
                        <ul class="menu-list">
                          <li><a>Dashboard</a></li>
                          <li><a>Customers</a></li>
                        </ul>
                        <p class="menu-label">
                          Administration
                        </p>
                        <ul class="menu-list">
                          <li><a>Team Settings</a></li>
                          <li>
                            <a class="is-active">Manage Your Team</a>
                            <ul>
                              <li><a>Members</a></li>
                              <li><a>Plugins</a></li>
                              <li><a>Add a member</a></li>
                            </ul>
                          </li>
                          <li><a>Invitations</a></li>
                          <li><a>Cloud Storage Environment Settings</a></li>
                          <li><a>Authentication</a></li>
                        </ul>
                    </aside>
                </div>
                
                <div class="column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in admin restaurant!
                </div>
            </div>
        </div>
    </section>
@endsection
