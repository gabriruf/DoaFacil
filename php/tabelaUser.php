<?php
try {
    $tables = $conn -> query("SHOW TABLES LIKE 'Users'");
    if ($tables->rowCount() < 1) {
        $conn -> query(
            "CREATE TABLE doafacil.Users (
                id_user       SERIAL PRIMARY KEY,
                nome_user     VARCHAR(50),
                email_user    VARCHAR(70),
                endereco_user VARCHAR(70),
                cel_user      VARCHAR(14),
                cep_user      VARCHAR(9),
                tipo_user     NUMERIC(1),
                pass_user     VARCHAR(255)
            );"
        );
    }
} catch(PDOException $e) {
    // Handle errors during db creation
    echo "Error creating table: " . $sql . "<br>" . $e->getMessage();
}