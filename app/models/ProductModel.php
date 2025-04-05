<?php
class ProductModel
{
    private $conn;
    private $table_name = "product";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả sản phẩm và danh mục của chúng
    public function getProducts()
    {
        $query = "
            SELECT p.id, p.name, p.description, p.price, p.image, c.name AS category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Lấy sản phẩm theo ID và kèm theo danh mục
    public function getProductById($id)
    {
        $query = "
            SELECT p.*, c.name AS category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
            WHERE p.id = :id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Thêm sản phẩm
    public function addProduct($name, $description, $price, $category_id, $image)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, description, price, category_id, image) 
                  VALUES (:name, :description, :price, :category_id, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":image", $image);
        return $stmt->execute();
    }

    // Cập nhật sản phẩm
    public function updateProduct($id, $name, $description, $price, $category_id, $image)
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description, 
                  price = :price, category_id = :category_id, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":image", $image);
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Tìm kiếm sản phẩm theo tên hoặc mô tả
    public function searchProducts($keyword)
    {
        $query = "
            SELECT p.id, p.name, p.description, p.price, p.image, c.name AS category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
            WHERE p.name LIKE :keyword1 OR p.description LIKE :keyword2
        ";

        $keyword = "%{$keyword}%";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":keyword1", $keyword, PDO::PARAM_STR);
        $stmt->bindParam(":keyword2", $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Lọc sản phẩm theo danh mục
    public function filterByCategory($category_id)
    {
        $query = "
            SELECT p.id, p.name, p.description, p.price, p.image, c.name AS category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
            WHERE p.category_id = :category_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Lấy tất cả danh mục
    public function getCategories()
    {
        $query = "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
