<!-- 報錯 -->
@if(session('error'))
<script>alert("{{ session('error') }}");</script>
@elseif(session(key: 'success'))
<script>alert("{{ session('success') }}");</script>
@endif


<div id="context">
    <h2 class="topic">Admin Page</h2>

        <form method="GET" action="{{ route('admin_show') }}" enctype="multipart/form-data">
            <!-- @csrf -->
            <div id="login_box">
                <img src="/img/cat_dim.png" alt="" height="50%">
                <div id="input_pwd">
                    <h2>hey, enter the password!</h2>
                    <div id="input_pwd_box">
                        <input name="pwd" type="text">
                        <input type="submit">
                    </div>
                </div>
            </div>
        </form>

</div>