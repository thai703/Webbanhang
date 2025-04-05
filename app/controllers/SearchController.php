<?php
class SearchController
{
    private $productModel;

    public function __construct()
    {
        require_once 'app/models/ProductModel.php';
        require_once 'app/config/Database.php';
        $database = new Database();
        $db = $database->getConnection();
        $this->productModel = new ProductModel($db);
    }

    public function index()
    {
        $keyword = $_GET['keyword'] ?? '';
        $category_id = $_GET['category_id'] ?? '';
        
        $products = [];
        if (!empty($keyword)) {
            $products = $this->productModel->searchProducts($keyword);
        } elseif (!empty($category_id)) {
            $products = $this->productModel->filterByCategory($category_id);
        } else {
            $products = $this->productModel->getProducts();
        }

        $categories = $this->productModel->getCategories();
        
        require_once 'app/views/search/index.php';
    }
}
?> 