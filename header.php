<?php
require_once 'core/init.php';
$user = new User();

?>
<header class="bg-primary" id="header">
    <div class="d-flex align-items-center"><button class="btn toggle-menu mr-3" id="openSidebar" type="button"><span></span> <span></span> <span></span></button>
        <form action="#" id="searchForm"><button class="btn ion-ios-search" type="button"></button> <input class="form-control" placeholder="Search..." type="text">
            <div class="search-card" data-scrollable="true">
                <div class="mb-3">
                    <div class="d-flex"><span class="text-uppercase mr-auto font-weight-bold text-dark">Artists</span> <a href="artists.html">View All</a></div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/1.jpg"><p class="text-truncate mt-2">Arebica Luna</p></a></div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/2.jpg"><p class="text-truncate mt-2">Gerrina Linda</p></a></div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/3.jpg"><p class="text-truncate mt-2">Zunira Willy</p></a></div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/4.jpg"><p class="text-truncate mt-2">Johnny Marro</p></a></div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/5.jpg"><p class="text-truncate mt-2">Jina Moore</p></a></div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="custom-card mb-3"><a class="text-dark" href="artist-details.html"><img alt="" class="card-img--radius-md" src="assets/images/cover/medium/6.jpg"><p class="text-truncate mt-2">Rasomi Pelina</p></a></div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex"><span class="text-uppercase mr-auto font-weight-bold text-dark">Track</span> <a href="songs.html">View All</a></div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/1.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">I Love You Mummy</p>
                                        <p class="text-truncate text-muted font-sm">Arebica Luna</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/2.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">Shack your butty</p>
                                        <p class="text-truncate text-muted font-sm">Gerrina Linda</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/3.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">Do it your way(Female)</p>
                                        <p class="text-truncate text-muted font-sm">Zunira Willy & Nutty Nina</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="d-flex"><span class="text-uppercase mr-auto font-weight-bold text-dark">Albums</span> <a href="songs.html">View All</a></div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/4.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">Say yes</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/5.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">Where is your letter</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="custom-card mb-3">
                                <a class="text-dark custom-card--inline" href="song-details.html">
                                    <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/6.jpg"></div>
                                    <div class="custom-card--inline-desc">
                                        <p class="text-truncate mb-0">Hey not me</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <ul class="header-options d-flex align-items-center">
            <!--<li><a class="language" data-target="#lang" data-toggle="modal" href="javascript:void(0);"><span>Language</span> <img alt="" src="http://kri8thm.com/html/listen/theme/assets/images/svg/translate.svg"></a></li>-->

            <?php
            if (!$user->isLoggedIn()) { ?>
          <li><a href="#" id="userlogin">Login</a></li>
          <li><a href="#" id="userJoin">Join</a></li>
           <?php }else{ ?>
                <li class="dropdown fade-in">
                    <a aria-expanded="false" aria-haspopup="true" class="d-flex align-items-center py-2" data-toggle="dropdown" href="javascript:void(0);" id="userMenu" role="button">
                        <div class="avatar avatar-sm avatar-circle"><img alt="user" src="assets/images/users/thumb.jpg"></div><span class="pl-2">Halo Admin</span></a>
                    <div aria-labelledby="userMenu" class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ion-md-contact"></i> <span>Profile</span></a> <a class="dropdown-item" href="#"><i class="ion-md-radio-button-off"></i> <span>Your Plan</span></a> <a class="dropdown-item" href="#"><i class="ion-md-settings"></i> <span>Settings</span></a>
                        <div
                                class="dropdown-divider"></div>
                        <div class="px-4 py-2"><a class="btn btn-sm btn-air btn-pill btn-danger" href="#">Logout</a></div>
                    </div>
                </li>
           <?php } ?>

        </ul>
    </div>
</header>