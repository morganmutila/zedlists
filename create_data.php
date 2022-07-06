<?php
require_once 'core/init.php';

$tbl_users = "CREATE TABLE IF NOT EXISTS users (
      id INT(255) NOT NULL AUTO_INCREMENT,
      first_name VARCHAR(50) NOT NULL,
      last_name VARCHAR(50) NOT NULL,
      username VARCHAR(50) NOT NULL,
      email VARCHAR(255) NOT NULL,
      phone_number VARCHAR(44) NULL,
      password VARCHAR(64) NOT NULL,
      salt VARCHAR(32) NOT NULL,
      gender ENUM('male','female') NOT NULL,
      se_qu VARCHAR(255) NULL,
      se_as VARCHAR(255) NULL,
      province VARCHAR(255) NULL,
      city VARCHAR(255) NULL,
      address VARCHAR(255) NULL,
      userlevel ENUM('a','b','c','d') NOT NULL DEFAULT 'a',
      avatar VARCHAR(255) NULL,
      joined DATETIME NOT NULL,
      dob DATETIME NOT NULL,
      groupz INT(11) NOT NULL DEFAULT '1',
      notescheck DATETIME NOT NULL,
      activated ENUM('0','1') NOT NULL DEFAULT '1',
      PRIMARY KEY (id),
      UNIQUE KEY username (username,email)
  	)";
$query = DB::getInstance()->query($tbl_users);
if ($query) {
    echo "<h3>user table created :)</h3>";
} else {
    echo "<h3>user NOT CREAted :(</h3>";
}
////// ///////// /////////// /////////////// /////////// 
$tbl_useroptions = "CREATE TABLE IF NOT EXISTS useroptions (
     id INT(255) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     background VARCHAR(255) NOT NULL,
     question VARCHAR(255) NULL,
     answer VARCHAR(255) NULL,
     temp_pass VARCHAR(64) NULL,
     salt VARCHAR(32) NULL,
     PRIMARY KEY (id),
     UNIQUE KEY username (username)
	)";
$query = DB::getInstance()->query($tbl_useroptions);
if ($query) {
    echo "<h3>useroptions table created :)</h3>";
} else {
    echo "<h3>useroptions NOT CREAted :(</h3>";
}
///////////////////////////////////////////////////////////////
$tbl_users_session = "CREATE TABLE IF NOT EXISTS users_session (
     id INT(255) NOT NULL AUTO_INCREMENT,
     user_id INT(11) NOT NULL,
     hash VARCHAR(250) NOT NULL,
     PRIMARY KEY (id)
  )";
$query = DB::getInstance()->query($tbl_users_session);
if ($query) {
    echo "<h3>users_session table created :)</h3>";
} else {
    echo "<h3>users_session NOT CREAted :(</h3>";
}
/////////////////////////////////////////////////////
$tbl_notifications = "CREATE TABLE IF NOT EXISTS notifications (
     id INT(255) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     initiator VARCHAR(50) NOT NULL,
     app VARCHAR(255)  NOT NULL,
     note VARCHAR(255) NOT NULL,
     did_read ENUM('0','1') NOT NULL DEFAULT '0',
     date_time DATETIME NOT NULL,
     PRIMARY KEY (id)
	)";
$query = DB::getInstance()->query($tbl_notifications);
if ($query) {
    echo "<h3>notifications table created :)</h3>";
} else {
    echo "<h3>notifications NOT CREAted :(</h3>";
}
////////////////////////////////////////////////////////
$tbl_groups = "CREATE TABLE IF NOT EXISTS groups (
     id INT(255) NOT NULL AUTO_INCREMENT,
     name VARCHAR(20) NOT NULL,
     permissions TEXT(255) NOT NULL,
     PRIMARY KEY (id)
  )";
$query = DB::getInstance()->query($tbl_groups);
if ($query) {
    echo "<h3>groups table created :)</h3>";
} else {
    echo "<h3>groups NOT CREAted :(</h3>";
}
////////////////////////////////////////////////////////
$tbl_into_groups = "INSERT INTO groups (name, permissions)
VALUES ('Standard user', '')";
$query = DB::getInstance()->query($tbl_into_groups);
$permisn = '{"moderator":1}';
$tbl_into_groups = "INSERT INTO groups (name, permissions)
VALUES ('Administrator', '$permisn')";
$query = DB::getInstance()->query($tbl_into_groups);
if ($query) {
    echo "<h3>groups data created ||:)</h3>";
} else {
    echo "<h3>groups data NOT CREAted :(</h3>";
}
///////////////////////////////////////////////////////
$tbl_song = "CREATE TABLE IF NOT EXISTS song(
        id INT(255) NOT NULL AUTO_INCREMENT,
        title VARCHAR(50) NOT NULL,
        artist VARCHAR(50) NOT NULL,
        filename TEXT NOT NULL,
        genre TEXT NOT NULL,
        lyrics TEXT NOT NULL,
        user_id INT(11) NOT NULL,
        down_number INT(11) NOT NULL,
        type VARCHAR (50) NOT NULL,
        date_added DATETIME NOT NULL,
        UNIQUE KEY id (id),
        PRIMARY KEY (id)
        
        )";
$query = DB::getInstance()->query($tbl_song);
if ($query) {
    echo "<h3>song table created :)</h3>";
} else {
    echo "<h3>song table NOT CREAted :(</h3>";
}
///////////////////////////////////////////////////////
$tbl_song_image = "CREATE TABLE IF NOT EXISTS song_image(
        id INT(255) NOT NULL AUTO_INCREMENT,
        imagename TEXT NOT NULL,
        song_id INT(255) NOT NULL,
        UNIQUE KEY id (id),
        PRIMARY KEY (id)
 
        )";
$query = DB::getInstance()->query($tbl_song_image);
if ($query) {
    echo "<h3>song_image table created :)</h3>";
} else {
    echo "<h3>song_image table NOT CREAted :(</h3>";
}
///////////////////////////////////////////////
$tbl_feedback = "CREATE TABLE IF NOT EXISTS feedback (
     id INT(255) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     message TEXT NOT NULL,
     from_page VARCHAR(50) NOT NULL,
     feedback_time DATETIME NOT NULL,
     PRIMARY KEY (id)
  )";
$query = DB::getInstance()->query($tbl_feedback);
if ($query) {
    echo "<h3>feedback table created :)</h3>";
} else {
    echo "<h3>feedback NOT CREAted :(</h3>";
}
///////////////////////////////////////////////
$tbl_logout_history = "CREATE TABLE IF NOT EXISTS logout_history (
     id INT(255) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     ip VARCHAR(50) NOT NULL,
     location VARCHAR(50) NOT NULL,
     operating_system VARCHAR(50) NOT NULL,
     from_page VARCHAR(50) NOT NULL,
     isp VARCHAR(50) NOT NULL,
     device VARCHAR(50) NOT NULL,
     browser VARCHAR(50) NOT NULL,
     logout_time DATETIME NOT NULL,
     PRIMARY KEY (id)
    )";
$query = DB::getInstance()->query($tbl_logout_history);
if ($query) {
    echo "<h3>logout_history table created :)</h3>";
} else {
    echo "<h3>logout_history NOT CREAted :(</h3>";
}
///////////////////////////////////////////////
$tbl_login_detail = "CREATE TABLE IF NOT EXISTS login_detail (
     id INT(255) NOT NULL AUTO_INCREMENT,
     username VARCHAR(50) NOT NULL,
     user_ip VARCHAR(50) NOT NULL,
     city VARCHAR(50) NOT NULL,
     region VARCHAR(50) NOT NULL,
     isp VARCHAR(50) NOT NULL,
     country VARCHAR(50) NOT NULL,
     ua TEXT NOT NULL,
     device_detection TEXT NOT NULL,
     device VARCHAR(50) NOT NULL,
     device_experimental TEXT NOT NULL,
     login_time DATETIME NOT NULL,
     PRIMARY KEY (id)
    )";
$query = DB::getInstance()->query($tbl_login_detail);
if ($query) {
    echo "<h3>login_detail table created :)</h3>";
} else {
    echo "<h3>login_detail NOT CREAted :(</h3>";
}