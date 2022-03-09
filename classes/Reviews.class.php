<?php


class Reviews
{
    public function update()
    {
        $id = $_GET["id"];
        $star = $_POST["rate"];
        $comment = $_POST["comment"];
        $avgReview = "SELECT AVG(stars) AS AverageStars FROM reviews WHERE  product_name = $id";


        $model = new Review();
        $model->update($id, $star, $comment);

        $model = new Product();
        $model->updateAverageByProductName($id, $avgReview);


        Route::goToProducts();
    }

}