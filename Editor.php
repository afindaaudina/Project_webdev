<?php
class Editor {
    private $conn;
    private $table_name = "editors";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getEditor($editorId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE editorId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $editorId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateEditor($editorId, $editorName, $editorDesc) {
        $query = "UPDATE " . $this->table_name . " SET editorName = ?, editorDesc = ? WHERE editorId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $editorName, $editorDesc, $editorId);
        return $stmt->execute();
    }
    
    public function updateEditorWithPic($editorId, $editorName, $editorDesc, $editorPicPath) {
        $query = "UPDATE " . $this->table_name . " SET editorName = ?, editorDesc = ?, editorPic = ? WHERE editorId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $editorName, $editorDesc, $editorPicPath, $editorId);
        return $stmt->execute();
    }
}
?>