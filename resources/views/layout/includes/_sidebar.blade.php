<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class="@yield('dashboard')"><i class="lnr lnr-home"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="/mahasiswa" class="@yield('mahasiswa')"><i class="lnr lnr-users"></i>
                        <span>Mahasiswa</span></a></li>
                <li><a href="/divisi" class="@yield('divisi')"><i class="fa fa-database"></i> <span>Divisi</span></a>
                </li>
                <li class="nav-head">
                    <strong> KRITERIA :</strong>
                </li>
                <li><a href="/aspirasi" class="@yield('aspirasi')"><i class="fa fa-bullhorn"></i>
                        <span>Aspirasi</span></a></li>
                <li><a href="/litbang" class="@yield('litbang')"><i class="lnr lnr-book"></i> <span>Litbang</span></a>
                </li>
                <li><a href="/humas" class="@yield('humas')"><i class="fa fa-handshake-o"></i> <span>Humas</span></a>
                </li>
                <li><a href="/keorganisasian" class="@yield('keorganisasian')"><i class="fa fa-sitemap"></i>
                        <span>Keorganisasian</span></a>
                </li>
                @if (auth()->user()->role == 'admin')

                <li class="nav-head">
                    <strong>PENGURUS :</strong>
                </li>
                <li><a href="/admin" class="@yield('admin')"><i class="fa fa-cogs"></i> <span>Users</span></a>
                </li>
                @endif
            </ul>

        </nav>
    </div>
</div>