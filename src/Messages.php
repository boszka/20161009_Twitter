<?php

class Message {

    private $messageId;
    private $creationDate;
    private $isRead;
    private $senderUserId;
    private $recipientUserId;
    private $text;
    private $senderUserName; //tylko geter nazwy użytkownika - nadawcy
    private $recipientUserName; //tylko geter nazwy użytkownika- odbiorcy

    public function __construct() {
        $this->messageId = -1;
        $this->creationDate = "";
        $this->isRead = 0;
        $this->text = "";
        $this->senderUserId = "";
        $this->recipientUserId = "";
    }

    public function getId() {
        return $this->messageId;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setCreationDate($newDate) {
        $this->creationDate = $newDate;
    }

    public function getIsRead() {
        return $this->isRead;
    }

    public function setIsRead($newIsRead) {
        $this->isRead = $newIsRead;
    }

    public function getSenderUserId() {
        return $this->senderUserId;
    }

    public function setSenderUserId($newSenderUserId) {
        $this->senderUserId = $newSenderUserId;
    }

    public function getRecipientUserId() {
        return $this->recipientUserId;
    }

    public function setRecipientUserId($newRecipientUserId) {
        $this->recipientUserId = $newRecipientUserId;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($newText) {
        $this->text = $newText;
    }

    public function getSenderUserName() {
        return $this->senderUserName;
    }

    public function getRecipientUserName() {
        return $this->recipientUserName;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->messageId == -1) {
            $sql = "INSERT INTO Messages (senderUserId, creationDate, isRead, recipientUserId,  text )
                  VALUES ('$this->senderUserId','$this->creationDate', $this->isRead,'$this->recipientUserId',  '$this->text')";

            $result = $connection->query($sql);
            if ($result == true) {
                $this->messageId = $connection->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Messages SET isRead = 1
                    WHERE messageId=$this->messageId";
            $result = $connection->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadMessageById(mysqli $connection, $id) {
        $sql = "SELECT m . * , recipient.userName AS recipientName, sender.userName AS senderName
            FROM Messages AS m
            JOIN User AS recipient ON m.recipientUserId = recipient.id
            JOIN User AS sender ON m.senderUserId = sender.id
                WHERE m.messageId=$id";


        $result = $connection->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedMessages = new Message();
            $loadedMessages->messageId = $row['messageId'];
            $loadedMessages->creationDate = $row['creationDate'];
            $loadedMessages->isRead = $row['isRead'];
            $loadedMessages->senderUserId = $row['senderUserId'];
            $loadedMessages->recipientUserId = $row['recipientUserId'];
            $loadedMessages->text = $row['text'];
            $loadedMessages->senderUserName = $row['senderName'];
            $loadedMessages->recipientUserName = $row['recipientName'];



            return $loadedMessages;
        }
        return null;
    }

    static public function getMessagesBySenderUserId(mysqli $connection, $senderUserId) {

        $sql = "SELECT Messages.messageId, recipientUserId, text, isRead, creationDate, userName
                FROM Messages
                JOIN User ON User.id = Messages.recipientUserId
                where senderUserId = $senderUserId ORDER BY creationDate DESC";

        $ret = [];
        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedSenderMessages = new Message();
                $loadedSenderMessages->messageId = $row['messageId'];
                $loadedSenderMessages->creationDate = $row['creationDate'];
                $loadedSenderMessages->isRead = $row['isRead'];
                $loadedSenderMessages->recipientUserId = $row['recipientUserId'];
                $loadedSenderMessages->text = $row['text'];

                $loadedSenderMessages->recipientUserName = $row['userName'];
                $ret[] = $loadedSenderMessages;
            }
        }
        return $ret;
    }

    static public function getMessagesByRecipientUserId(mysqli $connection, $recipientUserId) {

        $sql = "SELECT Messages.messageId, senderUserId, userName, text, isRead, creationDate
                FROM Messages
                JOIN User ON User.id = Messages.senderUserId
                WHERE recipientUserId =$recipientUserId ORDER BY creationDate DESC";

        $ret = [];
        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedRecipientMessages = new Message();
                $loadedRecipientMessages->messageId = $row['messageId'];
                $loadedRecipientMessages->senderUserId = $row['senderUserId'];
                $loadedRecipientMessages->text = $row['text'];
                $loadedRecipientMessages->isRead = $row['isRead'];
                $loadedRecipientMessages->creationDate = $row['creationDate'];
                $loadedRecipientMessages->senderUserName = $row['userName'];
                $ret[] = $loadedRecipientMessages;
            }
        }
        return $ret;
    }

}
