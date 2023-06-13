<?php

if (!isset($_SESSION['username'])) {
    header('Location: /project/project/index.php');
    exit;
}
