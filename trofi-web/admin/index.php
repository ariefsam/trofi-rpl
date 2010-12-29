<?php
session_start();
require 'fungsi.php';
require "../dbconfig.php";
if(!loginkah()) header("Location: login.php");
require "header.php";?>
<div class="pad20">
    <!-- Big buttons -->
    <ul class="dash">
        <li>
            <a href="" title="Write a new article" class="tooltip">
                <img src="index_files/8_48x480.png" alt="" />
                <span>New article</span>
            </a>
        </li>
        <li>
            <a href="list.php" title="What your team posted" class="tooltip">
                <img src="index_files/7_48x480.png" alt="" />
                <span>Daftar Artikel</span>
            </a>
        </li>
        <li>
            <a href="" title="Manage users and accounts" class="tooltip">
                <img src="index_files/16_48x48.png" alt="" />
                <span>Users</span>
            </a>
        </li>
        <li>
            <a href="" title="Your site's statistics" class="tooltip">
                <img src="index_files/4_48x480.png" alt="" />
                <span>Statistics</span>
            </a>
        </li>
        <li>
            <a href="" title="Bandwidth and traffic" class="tooltip">
                <img src="index_files/14_48x48.png" alt="" />
                <span>Bandwidth</span>
            </a>
        </li>
        <li>
            <a href="" title="Server warnings" class="tooltip">
                <img src="index_files/5_48x480.png" alt="" />
                <span>Server warnings</span>
            </a>
        </li>
        <li>
            <a href="" title="Manage downloads" class="tooltip">
                <img src="index_files/3_48x480.png" alt="" />
                <span>Downloads</span>
            </a>
        </li>
        <li>
            <a href="" title="Lorem ipsum" class="tooltip">
                <img src="index_files/9_48x480.png" alt="" />
                <span>Listings</span>
            </a>
        </li>
        <li>
            <a href="" title="Users' photo gallery" class="tooltip">
                <img src="index_files/1_48x480.png" alt="" />
                <span>Gallery</span>
            </a>
        </li>
        <li>
            <a href="" title="0 new messages" class="tooltip">
                <img src="index_files/25_48x48.png" alt="" />
                <span>Inbox</span>
            </a>
        </li>
        <li>
            <a href="" title="Browse for files" class="tooltip">
                <img src="index_files/21_48x48.png" alt="" />
                <span>File browser</span>
            </a>
        </li>
        <li>
            <a href="" title="Calculator" class="tooltip">
                <img src="index_files/30_48x48.png" alt="" />
                <span>Calculator</span>
            </a>
        </li>
        <li>
            <a href="" title="RSS Feeds" class="tooltip">
                <img src="index_files/29_48x48.png" alt="" />
                <span>Feeds</span>
            </a>
        </li>
        <li>
            <a href="" title="Lorem ipsum" class="tooltip">
                <img src="index_files/20_48x48.png" alt="" />
                <span>Media</span>
            </a>
        </li>
        <li>
            <a href="" title="Lorem ipsum" class="tooltip">
                <img src="index_files/26_48x48.png" alt="" />
                <span>Latest comments</span>
            </a>
        </li>
    </ul>
    <!-- End of Big buttons -->
</div>
<?php require "footer.php"?>