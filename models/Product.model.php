<?php


class Product extends DB
{

    public function get($pagination = null)
    {
        if (isset($_GET["name"])) {
            $name = $_GET["name"];
            $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$name%' ";
        } else if ($pagination !== null) {

            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            $offset = ($page - 1) * $pagination;
            $sql = "SELECT * FROM `products` LIMIT $pagination OFFSET {$offset}";
        } else {
            $sql = "SELECT * FROM `products`";
        }

        $result = $this->connect()->query($sql);
        return $result->fetchAll();


    }

    public function find($id)
    {
        $sql = "SELECT * FROM `products` WHERE id=$id";

        $result = $this->connect()->query($sql);

        return $result->fetch();
    }

    public function create($name, $description)
    {
        if (isset($_FILES['img'])) {
            $fileName = $_FILES['img']['name'];
            $fileTmp = $_FILES['img']['tmp_name'];

            $uploadFolder = "public/img/";

            move_uploaded_file($fileTmp, $uploadFolder . $fileName);

            $sql = "INSERT INTO `products`(id, name, description, image, avg_review) VALUES (NULL,'$name','$description','$fileName',NULL)";

        } else {
            $sql = "INSERT INTO `products`(id, name, description, image, avg_review) VALUES (NULL,'$name','$description',NULL,NULL)";

        }

        $this->connect()->query($sql);
    }

    public function count()
    {
        $sql = "SELECT COUNT('id') as count FROM `products`";

        $result = $this->connect()->query($sql);

        return $result->fetch()["count"];
    }

    public function updateAverageByProductName($id, $avgReview)
    {

        $sql = "UPDATE `products` SET `avg_review`=($avgReview) WHERE id = '$id'";
        $this->connect()->query($sql);


    }

}


