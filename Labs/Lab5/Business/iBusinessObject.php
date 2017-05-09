<?php
interface iBusinessObject
{
    public static function retrieveSome($start,$count,$params);
    public static function retrieveOne($actorId);
    public function save();
    public static function delete($id);
}
?>
