@extends('voyager::master')

@section('content')

<div class="container">
    <h2>Create New Request Information</h2>
    <form action="{{ route('request_information.store') }}" method="POST">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="default_role">Default Role</label>
                    <select class="form-control select2-ajax select2-hidden-accessible" name="role_id" data-get-items-route="http://127.0.0.1:8000/admin/users/relation" data-get-items-field="user_belongsto_role_relationship" data-method="add" data-select2-id="3" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="5">None</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-role_id-ba-container"><span class="select2-selection__rendered" id="select2-role_id-ba-container" role="textbox" aria-readonly="true" title="None">None</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <div class="form-group">
                    <label for="additional_roles">Additional Roles</label>
                    <select class="form-control select2-ajax select2-hidden-accessible" name="user_belongstomany_role_relationship[]" multiple="" data-get-items-route="http://127.0.0.1:8000/admin/users/relation" data-get-items-field="user_belongstomany_role_relationship" data-method="add" data-select2-id="6" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="8">None</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                <ul class="select2-selection__rendered">
                                    <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                </ul>
                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection