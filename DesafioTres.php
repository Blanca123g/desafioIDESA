<?php 
require_once 'Database.php';

class recuperarLotes {

    public static function getByLoteId(string $loteID) {

        Database::setDB();

        return self::getLotes($loteID);
    }

    private static function getLotes (string $loteID){
        $lotes = [];
        $cnx = Database::getConnection();
        $stmt = $cnx->query("SELECT * FROM debts WHERE lote = '$loteID'");
        while($rows = $stmt->fetchArray(SQLITE3_ASSOC)){
            $lotes[] = (object) $rows;
        }
        return $lotes;
    }
}
