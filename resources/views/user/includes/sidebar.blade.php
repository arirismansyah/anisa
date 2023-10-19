<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/zanex/images/brand/logo_anisa.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_anisa.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_anisa.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/zanex/images/brand/logo_anisa.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>


        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">

                <li class="sub-category">
                    <h3>Main</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('/home') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>


                @hasanyrole(['Admin|Ketua Tim Umum'])
                <li class="sub-category">
                    <h3>Input Komponen IKPA Umum</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">Input Komponen
                        </span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ url('/revisi_dipa') }}" class="slide-item"> Revisi Dipa</a></li>
                        <li><a href="{{ url('/belanja_kontraktual') }}" class="slide-item"> Belanja Kontraktual</a>
                        </li>
                        <li><a href="{{ url('/tagihan') }}" class="slide-item"> Penyelesaian Tagihan</a></li>
                        <li><a href="{{ url('/uptup') }}" class="slide-item"> Pengelolaan UP/TUP</a></li>
                        <li><a href="{{ url('/spm') }}" class="slide-item"> Dispensasi SPM</a></li>
                    </ul>
                </li>
                @endhasanyrole

                @hasanyrole(['Admin|Ketua Tim'])
                    <li class="sub-category">
                        <h3>Input Komponen IKPA Tim</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                                class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">Input Komponen
                            </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{ url('/deviasi_tiga_dipa') }}" class="slide-item"> Deviasi Halaman III
                                    DIPA</a>
                            </li>
                            <li><a href="{{ url('/penyerapan_anggaran') }}" class="slide-item"> Penyerapan Anggaran</a>
                            </li>
                            <li><a href="{{ url('/capaian_output') }}" class="slide-item"> Capaian Output</a></li>

                        </ul>
                    </li>
                @endhasanyrole

                <li class="sub-category">
                    <h3>About IKPA</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('/knowledges') }}"><i
                            class="side-menu__icon fe fe-book-open"></i><span
                            class="side-menu__label">Knowledges</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ url('/faq') }}"><i
                            class="side-menu__icon fe fe-help-circle"></i><span class="side-menu__label">FAQ</span></a>
                </li>

                {{-- <li class="sub-category">
                    <h3>Settings</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="widgets.html"><i
                            class="side-menu__icon fe fe-settings"></i><span
                            class="side-menu__label">Setting</span></a>
                </li> --}}

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
