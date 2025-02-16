<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250102182715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create produkt_table and recenzje_table with proper relations';
    }

    public function up(Schema $schema): void
    {
        // Tworzenie tabeli produkt_table
        $this->addSql('CREATE TABLE produkt_table (
            id INT AUTO_INCREMENT NOT NULL, 
            typ VARCHAR(255) NOT NULL, 
            marka VARCHAR(255) NOT NULL, 
            model VARCHAR(255) NOT NULL, 
            cena DECIMAL(10, 2) NOT NULL, 
            graf JSON NOT NULL COMMENT \'(DC2Type:json)\', 
            brzmienie VARCHAR(255) NOT NULL, 
            srednia_ocen DECIMAL(3, 2) DEFAULT NULL, 
            PRIMARY KEY (id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Tworzenie tabeli recenzje_table
        $this->addSql('CREATE TABLE recenzje_table (
            id INT AUTO_INCREMENT NOT NULL, 
            id_produktu INT NOT NULL, 
            ocena INT NOT NULL CHECK (ocena BETWEEN 1 AND 5), 
            opis_recenzji TEXT DEFAULT NULL, 
            PRIMARY KEY (id), 
            INDEX idx_id_produktu (id_produktu), 
            FOREIGN KEY (id_produktu) REFERENCES produkt_table (id) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Usuwanie tabel podczas rollbacku
        $this->addSql('DROP TABLE recenzje_table');
        $this->addSql('DROP TABLE produkt_table');
    }
}

