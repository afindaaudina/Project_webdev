<?php

class Editor{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function createEditor($editorId, $editorName, $editorPic, $editorDesc, $editorPw){
        
        $editorPw = password_hash($editorPw, PASSWORD_DEFAULT);

        $sql = "INSERT INTO editors (editorId, editorName, editorPic, editorDesc, editorPw) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if($stmt){

             $editorPic = $_FILES['editorPic']['name'];
             $editorPic_size = $_FILES['editorPic']['size'];
             $editorPic_tmp_name = $_FILES['editorPic']['tmp_name'];
             $editorPic_folder = '../imagess/'.$editorPic;
 
             if($editorPic_size > 2000000){
                 echo("File size is too large");
              }else{
                 move_uploaded_file($editorPic_tmp_name, $editorPic_folder);
              }
              
            $stmt->bind_param("sssss", $editorId, $editorName, $editorPic, $editorDesc, $editorPw);
            $result = $stmt->execute();

            if($result){
                header('Location:editor_home.php');
                exit();
                return true;
            }
            else{
                return "Error: ".$stmt->error;
            }
            $stmt->close();
        }
        else{
            return "Error: ".$this->conn->error;
        }
    }

    public function getEditor($editorId){
        $sql = "SELECT * FROM editors WHERE editorId = ?";
        $stmt = $this->conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("s", $editorId);
            $stmt->execute();
            $result = $stmt->get_result();
            $admin = $result->fetch_assoc();

            $stmt->close();
            return $admin;
        }
        else{
            return "Error: ".$this->conn->error;
        }
    }

    
    public function getEditors()
    {
        $sql = "SELECT * FROM editors";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateEditor($editorId, $editorPic, $editorDesc)
    {
        $sql = "UPDATE editors SET editorPic = ?, editorDesc = ? WHERE editorId = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param("sss", $editorPic, $editorDesc, $editorId);
            $result = $stmt->execute();

            if ($result) {
                header('Location: editor_profile.php');
                exit();
                return true;
            } else {
                return "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            return "Error: " . $this->conn->error;
        }
    }


    public function countEditors(){
        $sql = "SELECT COUNT(*) as total FROM editors";
        $result = $this->conn->query($sql);
        return $result;
    }


}
?>