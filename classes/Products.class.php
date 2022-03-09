<?php


class Products
{
    public function index()
    {
        $pagination = 5;
        $model = new Product();
        $products = $model->get($pagination);
        $count = $model->count();
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;

        return view("pages.products.index", compact(["products", "count", "pagination", "page"]));
    }

    public function create()
    {
        return view("pages.products.create");
    }

    public function save()
    {

        $name = $_POST["name"];
        $description = $_POST["description"];


        $model = new Product();
        $model->create($name, $description);

        Route::goToProducts();


    }

    public function edit()
    {
        $id = $_GET["id"];
        $model = new Product();
        $product = $model->find($id);

        view("pages.products.review", ["product" => $product]);
    }


}