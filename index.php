<?php require_once 'core/init.php'; 

//error_reporting(0);

$user = new User();

if ($user->isLoggedIn()) {

}
    $flash = '';

if (Session::exists('home')) {

    $flash = Session::flash('home');  

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>ZedLists - Online Music Streaming</title>
    <?php include_once 'header_files.php'; ?>
</head>

<body>
    <div id="loading">
        <div class="loader">
            <div class="eq"><span class="eq-bar eq-bar--1"></span> <span class="eq-bar eq-bar--2"></span> <span class="eq-bar eq-bar--3"></span> <span class="eq-bar eq-bar--4"></span> <span class="eq-bar eq-bar--5"></span> <span class="eq-bar eq-bar--6"></span></div>
            <span
                class="text">Loading</span>
        </div>
    </div>
    <div data-scrollable="true" id="wrapper">
<?php
//aside bar
include_once 'asidebar.php';

?>
        <main id="pageWrapper">

<?php
//header,search and user profile link
include_once 'header.php';

?>

    <div class="banner bg-home"></div>
    <div class="main-container">
        <?php
        //top chart
        include 'topchart.php';

        //events,recent,trending
        include_once 'main_row.php';

        //New Releases
        include_once 'new_release.php';

        //Featured Artists
        include_once 'featured_artists.php';

        //Your Playlist //Retro Classic //Radio //Genres
        include_once 'other_main.php';
        ?>

    </div>
    <footer class="bg-img" id="footer">
        <div class="footer-content"><a class="email" href="#">info@zedlists.com</a>
            <div class="platform-btn-inline"><a class="btn btn-dark btn-air platform-btn" href="#"><i class="ion-logo-android"></i><div class="platform-btn-info"><span class="platform-desc">Available on</span> <span class="platform-name">Android</span></div></a><a class="btn btn-danger btn-air platform-btn"
                    href="#"><i class="ion-logo-apple"></i><div class="platform-btn-info"><span class="platform-desc">Available on</span> <span class="platform-name">App Store</span></div></a></div>
        </div>
    </footer>
    <div class="player-primary" id="audioPlayer">
        <div id="progress-container"><input class="amplitude-song-slider" type="range"><progress class="audio-progress audio-progress--played amplitude-song-played-progress"></progress><progress class="audio-progress audio-progress--buffered amplitude-buffered-progress" value="0"></progress></div>
        <div
            class="audio">
            <div class="song-image"><img alt="" data-amplitude-song-info="cover_art_url" src="assets/images/cover/small/1.jpg"></div>
            <div class="song-info pl-3"><span class="song-name d-inline-block text-truncate" data-amplitude-song-info="name"></span> <span class="song-artists d-block text-muted" data-amplitude-song-info="artist"></span></div>
    </div>
    <div class="audio-controls">
        <div class="audio-controls--left d-flex mr-auto"><button class="btn btn-icon-only amplitude-repeat"><i class="ion-md-sync"></i></button></div>
        <div class="audio-controls--main d-flex"><button class="btn btn-icon-only amplitude-prev"><i class="ion-md-skip-backward"></i></button> <button class="btn btn-air btn-pill btn-default btn-icon-only amplitude-play-pause"><i class="ion-md-play"></i> <i class="ion-md-pause"></i></button>            <button class="btn btn-icon-only amplitude-next"><i class="ion-md-skip-forward"></i></button></div>
        <div class="audio-controls--right d-flex ml-auto"><button class="btn btn-icon-only amplitude-shuffle amplitude-shuffle-off"><i class="ion-md-shuffle"></i></button></div>
    </div>
    <div class="audio-info d-flex align-items-center pr-4"><span class="mr-4"><span class="amplitude-current-minutes"></span>:<span class="amplitude-current-seconds"></span> / <span class="amplitude-duration-minutes"></span>:<span class="amplitude-duration-seconds"></span></span>
        <div class="audio-volume dropdown"><button aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only" data-toggle="dropdown"><i class="ion-md-volume-low"></i></button>
            <div class="dropdown-menu dropdown-menu-right volume-dropdown-menu"><input class="amplitude-volume-slider" type="range" value="100"></div>
        </div>
        <div class="dropleft"><button aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only" data-toggle="dropdown"><i class="la la-ellipsis-v"></i></button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
            </ul>
        </div><button class="btn btn-icon-only" id="playList"><i class="ion-md-musical-note"></i></button></div>
    </div>
    </main>
    <aside id="rightSidebar">
        <div class="right-sidebar-header">Listen Special</div>
        <div class="right-sidebar-body" data-scrollable="true">
            <ul class="list-group list-group-flush">
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="0">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/1.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">I Love You Mummy</p>
                            <p class="text-truncate text-muted font-sm">Arebica Luna</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="1">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/2.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Shack your butty</p>
                            <p class="text-truncate text-muted font-sm">Gerrina Linda</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="2">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/3.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Do it your way(Female)</p>
                            <p class="text-truncate text-muted font-sm">Zunira Willy & Nutty Nina</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="3">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/4.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Say yes</p>
                            <p class="text-truncate text-muted font-sm">Johnny Marro</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="4">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/5.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Where is your letter</p>
                            <p class="text-truncate text-muted font-sm">Jina Moore & Lenisa Gory</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="5">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/6.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Hey not me</p>
                            <p class="text-truncate text-muted font-sm">Rasomi Pelina</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="custom-list--item list-group-item">
                    <div class="text-dark custom-card--inline amplitude-song-container amplitude-play-pause" data-amplitude-playlist="special" data-amplitude-song-index="6">
                        <div class="custom-card--inline-img"><img alt="" class="card-img--radius-sm" src="assets/images/cover/small/7.jpg"></div>
                        <div class="custom-card--inline-desc">
                            <p class="text-truncate mb-0">Deep inside</p>
                            <p class="text-truncate text-muted font-sm">Pimila Holliwy</p>
                        </div>
                    </div>
                    <ul class="custom-card--labels d-flex ml-auto">
                        <li class="dropleft"><a aria-expanded="false" aria-haspopup="true" class="btn btn-icon-only p-0 w-auto h-auto" data-toggle="dropdown" href="javascript:void(0);"><i class="la la-ellipsis-h"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link favorite" href="javascript:void(0);"><i class="la la-heart-o"></i> <span>Favorite</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-plus"></i> <span>Add to Playlist</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-download"></i> <span>Download</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Share</span></a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="song-details.html"><i class="la la-info-circle"></i> <span>Song Info</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    </div>

    <div aria-hidden="true" aria-labelledby="loginTitle" class="modal fade" id="login" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 pb-0"><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button></div>
                <h6 class="modal-title text-center mb-3" id="loginTitle">Login For Awesome Listing Experience</h6>
                <div class="modal-body">
                    <form action="login.php" class="mx-4 pb-5" method="post">
                        <div class="form-group"><input class="form-control" required name="phone_number" placeholder="mobile number" type="text"></div>
                        <div class="form-group"><input class="form-control" required name="password" placeholder="Password" type="password"></div><button class="btn btn-block btn-bold btn-air btn-info" type="submit" type="button">Login</button></form>
                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="loginTitle" class="modal fade" id="Join" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 pb-0"><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button></div>
                <h6 class="modal-title text-center mb-3" id="loginTitle">Sing Up For Awesome Listing Experience</h6>
                <div class="modal-body">
                    <form action="#" class="mx-4 pb-5" method="post">
                        <div class="form-group"><input class="form-control" required id="first_name" placeholder="First Name" type="text"></div>
                        <div class="form-group"><input class="form-control" required id="last_name" placeholder="Last Name" type="text"></div>
                        <div class="form-group"><input class="form-control" required id="phone_number" name="phone_number" placeholder="mobile number" type="text"></div>

                        <div id="error_pn"></div>

                       <div class="form-group"> <label for="gender">Gender</label>
            <select name="gender" id="gender" required class="form-control">
                <option value="">&nbsp;-- Select --</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select></div>
                        <div class="form-group"><input class="form-control" required name="password" placeholder="Password" id="p1" type="password"></div>
                        <div id="error_p1"></div>
                        <div class="form-group"><input class="form-control" required name="password_again" placeholder="Re-enter Password" required id="p2" type="password"></div>
                        <div id="error_p2"></div>
                        <button class="btn btn-block btn-bold btn-air btn-info" id="sent_this" type="button">Join</button></form>
                </div>
            </div>
        </div>
    </div>

    <div class="backdrop header-backdrop"></div>
    <div class="backdrop sidebar-backdrop"></div>
    <script src="assets/js/vendors.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>