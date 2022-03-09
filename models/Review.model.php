<?php


class Review extends DB
{

    public function update($id, $star, $comment)
    {
        $userName = $_SESSION['auth']['id'];

        $sql = "INSERT INTO `reviews`(id, user_name, product_name, stars, comment) VALUES (NULL,'$userName','$id','$star','$comment')";

        $this->connect()->query($sql);

    }

}


