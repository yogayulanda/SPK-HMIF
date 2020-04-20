<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard" class="lead"><img src="{{asset('sistem/assets/img/logo-dark.PNG')}}"
                class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div class="container-fluid">
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="lnr lnr-question-circle"></i>
                            <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="QABobot" href="#">Apa Itu Bobot Kriteria ?</a></li>
                            <li><a class="utility" href="#">Apa Itu Nilai Utility ?</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-cog"></i>
                            <span>Pengaturan</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/mahasiswa/export">Export Data Mahasiswa</a></li>
                            <li><a href="/aspirasi/export">Export Nilai Aspirasi</a></li>
                            <li><a href="/litbang/export">Export Nilai Litbang</a></li>
                            <li><a href="/humas/export">Export Nilai Humas</a></li>
                            <li><a href="/keorganisasian/export">Export Nilai Keorganisasian</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                src="{{asset('sistem/assets/img/user.png')}}" class="img-circle" alt="Avatar">
                            <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/{{auth()->user()->id}}/edit"><i class="lnr lnr-user"></i> <span>My
                                        Profile</span></a></li>
                            <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
</nav>