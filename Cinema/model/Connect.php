<!-- "Connect.php" permettant de se connecter à la BDD (grâce à PDO) -->
<?php
    // On remarque le namespace de la classe Connect --> "Model"
    namespace Model;
    // La classe est abstraite car on n'instanciera jamais la classe Connect 
    // Puisqu'on aura seulement besoin d'accéder à la méthode "seConnecter"
    abstract class Connect
    {
        const HOST = "localhost";
        const DB = "cinema";
        const USER = "root";
        const PASS = "";

        public static function seConnecter()
        {
            try
            {
                return new \PDO("mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
            }
            catch(\PDOException $ex)
            {
                return $ex->getMessage();
            }
        }
    }

?>