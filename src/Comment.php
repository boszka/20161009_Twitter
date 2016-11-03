<?php

class Comment {
    private $id;
    private $userId;
    private $tweetId;
    private $text;
    private $creationDate;
    private $username;
    

    public function __construct() {
        $this->id = -1;
        $this->userId = "";
        $this->tweetId = "";
        $this->text = "";
        $this->creationDate = "";
    }

    public function setUserId($newUserId) {
        $this->userId = $newUserId;
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function setTweetId($newTweetId) {
        $this->tweetId = $newTweetId;
    }
    
    public function getTweetId() {
        return $this->tweetId;
    }
    
    public function setText($newText) {
        $this->text = $newText;
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function setCreationDate($newDate) {
        $this->creationDate = $newDate;
    }
        
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function getUsername() {
        return $this->username;
    }  
    
    
    static public function loadCommentById(mysqli $connection, $id) {
        $sql = "SELECT * FROM Comment WHERE id=$id";
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedCommentById = new Comment();
            $loadedCommentById->id = $row['id'];
            $loadedCommentById->userId = $row['userId'];
            $loadedCommentById->tweetId = $row['tweetId'];
            $loadedCommentById->text= $row['text'];
            $loadedCommentById->creationDate= $row['creationDate'];
            $loadedCommentById->username= $row['username'];
            return $loadedCommentById;
        }
        return null;
    }
    
    
    static public function loadAllCommentsByTweetId(mysqli $connection, $tweetId) {
        $sql = "SELECT User.username, Tweet.id, Comment.* FROM Comment inner JOIN User ON Comment.userId=User.id  inner join Tweet on Tweet.id = Comment.tweetId WHERE tweetId=$tweetId ORDER BY creationDate DESC ";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedCommentsByTweetId = new Comment();
                $loadedCommentsByTweetId->id = $row['id'];
                $loadedCommentsByTweetId->userId = $row['userId'];
                $loadedCommentsByTweetId->tweetId = $row['tweetId'];
                $loadedCommentsByTweetId->text= $row['text'];
                $loadedCommentsByTweetId->creationDate= $row['creationDate'];
                $loadedCommentsByTweetId->username= $row['username'];
                $ret[] = $loadedCommentsByTweetId;
            }
        }   
        return $ret;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            $sql = "INSERT INTO Comment (userId,tweetId, text, creationDate)
                  VALUES ('$this->userId','$this->tweetId', '$this->text', '$this->creationDate')";
            $result = $connection->query($sql);
            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } 
        } else {
            $sql = "UPDATE Comment SET text='$this->text',
                    creationDate='$this->creationDate' WHERE id=$this->id";
            $result = $connection->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }
}