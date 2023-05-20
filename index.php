<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => mysqli_error($conn)));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $img1 = mysqli_real_escape_string($conn, $_POST["img1"]);
    $precio_ara = mysqli_real_escape_string($conn, $_POST["precio_ara"]);
    $precio_d1 = mysqli_real_escape_string($conn, $_POST["precio_d1"]);


    $sql2 = "INSERT INTO products (name, category, img1 ,precio_ara, precio_d1) VALUES ('$name', '$category', '$img1', '$precio_ara', '$precio_d1')";
    $res = mysqli_query($conn, $sql2);

    if ($res) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => mysqli_error($conn)));
    }
}

if (isset($conn) && $conn->ping()) {

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET['category']) && $_GET['category'] == "bebida") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);

            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "abasicos") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "mecato") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "lacteos") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "aseo") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "fruta") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "carne") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } elseif (isset($_GET['category']) && $_GET['category'] == "cuidadoperso") {
            $category = mysqli_real_escape_string($conn, $_GET['category']);
            $sql = "SELECT * FROM `products` WHERE category = '$category';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }
        } else {
            $sql3 = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql3);

            if ($result) {
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                echo json_encode($data);
            } else {
                echo json_encode(array('success' => false, 'error' => mysqli_error($conn)));
            }
        }
    }

} else {
    echo "MySQLi connection is not open.";
}

?>