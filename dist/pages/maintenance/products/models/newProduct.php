<?php
include("./../../../../databases/db.php");

include("./../../../../php/verifySizeImage.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $id_category = (int) $_POST['id_category'];


    $uploadDirectory = "./../../../../assets/images/products/";
    $image = $_FILES['image'];
    $nameImage = $image['name'];
    $pdfFilePath = $uploadDirectory . $nameImage;

    $sizeImage = verifySizeImage($image['size']);

    if (!$sizeImage) {

        $status = 'sizeError';

    } else {

        try {
            $query = "INSERT INTO products (name, price, id_category, url_image)  VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssis", $name, $price, $id_category, $nameImage);
            $stmt->execute();
            $stmt->close();

            if (move_uploaded_file($image['tmp_name'], $pdfFilePath)) {
                $status = true;
            } else {
                $status = false;
            }

        } catch (Exception $e) {
            $status = false;
        }
    }


}

$conn->close();


echo json_encode([
    'status' => $status,
])

    ?>
