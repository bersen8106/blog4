<?php
// helpers.php

function generateSalt($length = 16) {
    return bin2hex(random_bytes($length));
}