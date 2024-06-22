<?php
class Recipe {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createRecipe($recipeId, $editorId, $recipeName, $recipePic, $recipeDesc, $ingredients, $instructions) {
        $sql = "INSERT INTO recipes (recipeId, editorId, recipeName, recipePic, recipeDesc, ingredients, instructions) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            if (isset($_FILES['recipePic']) && $_FILES['recipePic']['error'] == UPLOAD_ERR_OK) {
                $recipePic = $_FILES['recipePic']['name'];
                $recipePic_tmp_name = $_FILES['recipePic']['tmp_name'];
                $recipePic_folder = 'imagess/' . $recipePic;

                if ($_FILES['recipePic']['size'] > 2000000) {
                    echo "File size is too large.";
                    return false;
                } else {
                    move_uploaded_file($recipePic_tmp_name, $recipePic_folder);
                }
            } else {
                $recipePic = null;
            }

            $stmt->bind_param("sssssss", $recipeId, $editorId, $recipeName, $recipePic, $recipeDesc, $ingredients, $instructions);
            $result = $stmt->execute();

            if ($result) {
                header('Location: editor_home.php');
                exit();
            } else {
                return "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    public function getRecipe($recipeId) {
        $sql = "SELECT recipeId, recipeName, recipePic, recipeDesc, editorName, recipeDate, ingredients, instructions 
                FROM recipes 
                INNER JOIN editors 
                ON recipes.editorId = editors.editorId 
                WHERE recipeId = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $recipeId);
            $stmt->execute();
            $result = $stmt->get_result();
            $recipe = $result->fetch_assoc();

            $stmt->close();
            return $recipe;
        } else {
            return "Error: " . $this->conn->error;
        }
    }
    
    //fetch by recipe name
    public function getRecipeByName($recipeName) {
        $sql = "SELECT recipeId, recipeName, recipePic, recipeDesc, editorName, recipeDate, ingredients, instructions 
                FROM recipes 
                INNER JOIN editors 
                ON recipes.editorId = editors.editorId 
                WHERE recipeName = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $recipeName);
            $stmt->execute();
            $result = $stmt->get_result();
            $recipe = $result->fetch_assoc();

            $stmt->close();
            return $recipe;
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    public function getRecipes() {
        $sql = "SELECT recipeId, recipeName, recipePic, editorName, recipeDate, recipeDesc 
                FROM recipes 
                INNER JOIN editors 
                ON recipes.editorId = editors.editorId";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateRecipe($recipeId, $recipeName, $recipePic, $recipeDesc, $ingredients, $instructions, $recipeDate) {
        $sql = "UPDATE recipes 
                SET recipeName = ?, recipePic = ?, recipeDesc = ?, ingredients = ?, instructions = ?, recipeDate = ? 
                WHERE recipeId = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssssss", $recipeName, $recipePic, $recipeDesc, $ingredients, $instructions, $recipeDate, $recipeId);
            $result = $stmt->execute();

            if ($result) {
                if (isset($_FILES['recipePic']) && $_FILES['recipePic']['error'] == UPLOAD_ERR_OK) {
                    $recipePic = $_FILES['recipePic']['name'];
                    $recipePic_tmp_name = $_FILES['recipePic']['tmp_name'];
                    $recipePic_folder = 'upload/' . $recipePic;

                    if ($_FILES['recipePic']['size'] > 2000000) {
                        echo "File size is too large.";
                        return false;
                    } else {
                        move_uploaded_file($recipePic_tmp_name, $recipePic_folder);
                    }
                }

                header('Location: recipe_list.php');
                exit();
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    public function deleteRecipe($recipeId) {
        $sql = "DELETE FROM recipes WHERE recipeId = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $recipeId);
            $result = $stmt->execute();

            if ($result) {
                header('Location: recipe_list.php');
                exit();
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error;
        }
    }

    public function countRecipes() {
        $sql = "SELECT COUNT(*) as total FROM recipes";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>