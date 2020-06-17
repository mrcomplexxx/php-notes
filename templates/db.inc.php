<?php

$conn = new mysqli("127.0.0.1", "root", "toor", "my_image_gallery");

if ($conn->connect_error) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
